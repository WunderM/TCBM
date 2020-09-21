<html>
<head>
<title>Tabelle bearbeiten</title>
</head>

<body>
<?php
    // Verbindung zur Datenbank herstellen
    require_once "dbconnect.php";

		 // übergebene Daten zurück in die Datenbank schreiben
    if (isset($_POST[submit_eingabemaske]))	// Submit-Schaltfläche der Eingabemaske wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $sql="UPDATE stud SET name='$_POST[name]', gebdat='$_POST[gebdat]'
                    WHERE matrnr=$_POST[matrnr]";
        // SQL-Kommando ausführen
        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

    // SQL-Anfrage: Ergebnis ist eine vorhandene Tabelle
    $sql="SELECT * FROM stud";

    // Anfrage ausführen
    $result=mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");

    // Tabelle in HTML darstellen
    echo "<table border=\"1\">\n";
    while ($row=mysql_fetch_row($result))
    {
        echo "<tr>";
        foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
            echo "<td>$item</td>";
        echo "<td><a href=\"eingabemaske.php?id=$row[0]\">bearbeiten</td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
</body>
</html>