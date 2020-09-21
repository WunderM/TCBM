<html>
<head>
<title>Tabelle darstellen</title>
</head>

<body>
<?php
    // Verbindung zur Datenbank herstellen
    require_once "dbconnect.php";

    // SQL-Anfrage: Ergebnis ist stets eine Tabelle
    $sql="SELECT matrnr, name FROM stud WHERE name LIKE 'M%'";

    // Anfrage ausführen
    $result=mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");

    // Tabelle in HTML darstellen
    echo "<table border=\"1\">\n";
    while ($row=mysql_fetch_row($result))
    {
        echo "<tr>";
        foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
            echo "<td>$item</td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
</body>
</html>