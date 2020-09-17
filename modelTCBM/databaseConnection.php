<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of databaseConnection
 *
 * @author m.wunder
 */
class databaseConnection {

	public function __construct() {
		buildConnection();
	}

	public static function buildConnection(String $sQuery){
		$host = 'localhost';
		$username = 'root';
		$password = "";
		$database = 'tcbm';
		$mysqliObject = new mysqli($host, $username, $password);
			if (mysqli_connect_errno())
			{
					echo('Can\'t reach database. The following error occurred: "' . mysqli_connect_errno() . ' : ' . mysqli_connect_error() . '"');
			}
			// Select Database
			$selected = $mysqliObject->select_db($database);
			if (!$selected)
			{
				$mysqliObject->close();
				die('Can\'t open database "'.$database.'". Are you sure it exists? ');
			}
			// Choose UTF-8 encoding
			$mysqliObject->query("SET NAMES 'utf8'");

			$result = $mysqliObject->query($sQuery);
			if ($result)
			{
				var_dump($result);
				$return = $result->fetch_assoc();

				// MySQL-Version aus dem Rückgabe-Array auslesen
				echo "We are working with MySQL version {$return['version']}";
			} else {
					$mysqliObject->close();
					die('The following error occurred: "'.$sql.'"');
			}
			// Close the database connection
			$mysqliObject->close();
		}
}
?>