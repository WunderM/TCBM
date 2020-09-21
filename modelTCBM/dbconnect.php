<?php
    // Verbindungsdaten
    $serv="localhost";
    $user="root";
    $pass="";
    $base="tcbm";
    // Einstellung: SQL-Fehlermeldungen anzeigen
    $showsqlerrors=true;
    // Verbindung herstellen
    $mysql=@mysqli_connect($serv, $user, $pass, $base)
        or sqlExit("Fehler bei Verbindung zur Datenbank: $serv $user $pass $base<br/>");

    // Ausgabe einer Fehlermeldung und Abbruch
    function sqlExit($sql)
    {
        global $showsqlerrors, $mysql;
        if ($showsqlerrors)
            echo "Fehler in SQL-Kommando: $sql<br/>".@mysqli_error($mysql)."<br/>";
        exit();
    }

    // Ausführung des SQL-Kommandos $sql
    // Abbruch, falls SQL-Kommando fehlerhaft
    function sqlQuery($sql)
    {
        global $mysql;
        $result=mysqli_query($mysql, $sql) or sqlExit($sql);
        return $result;
    }
?>