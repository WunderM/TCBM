<html>
<head>
<title>Tabelle bearbeiten</title>
</head>

<body>
<?php
    // Verbindung zur Datenbank herstellen
    require_once "dbconnect.php";

		 // �bergebene Daten zur�ck in die Datenbank schreiben
    if (isset($_POST[submit_eingabemaske]))	// Submit-Schaltfl�che der Eingabemaske wurde bet�tigt
    {
        // SQL-Kommando: �ndern von Eintr�gen
        $sql="UPDATE stud SET name='$_POST[name]', gebdat='$_POST[gebdat]'
                    WHERE matrnr=$_POST[matrnr]";
        // SQL-Kommando ausf�hren
        mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");
    }

    // SQL-Anfrage: Ergebnis ist eine vorhandene Tabelle
    $sql="SELECT * FROM stud";

    // Anfrage ausf�hren
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