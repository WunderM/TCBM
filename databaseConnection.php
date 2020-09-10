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

	public static function buildConnection(){
		$host = 'localhost';
		$username = 'USERNAME';
		$password = "PASSWORT";
		$database = 'DATABASENAME';
		$mysqliObject = new mysqli($host, $username, $password);
			if (mysqli_connect_errno())
			{
					echo('Can\'t reach database. The following error occurred: "' . mysqli_connect_errno() . ' : ' . mysqli_connect_error() . '"');
			}
			// Select Database
			$selected = $mysqliObject->select_db($database);
			if (!$selected)
			{
					die('Can\'t open database "'.$database.'". Are you sure it exists? ');
			}
			// Choose UTF-8 encoding
			$mysqliObject->query("SET NAMES 'utf8'");

			// TODO: Here you need to insert your query...
			$sql = "SELECT version() AS version";
			$result = $mysqliObject->query($sql);
			if ($result)
			{
					$return = $result->fetch_assoc();

					// MySQL-Version aus dem Rückgabe-Array auslesen
					echo "We are working with MySQL version {$return['version']}";
			} else {
					die('The following error occurred: "'.$sql.'"');
			}
			// Close the database connection
			$mysqliObject->close();
		}
}
?>