<html>
<head>
<title>Eingabemaske</title>
</head>

<body>
<?php
    // Verbindung zur Datenbank herstellen
    require_once "dbconnect.php";

    // SQL-Anfrage: Zeile mit der übergebenen Matrikelnummer  wählen
    $sql="SELECT * FROM stud WHERE matrnr=$_GET[id]";

    // Anfrage ausführen
    $result=mysql_query($sql) or exit("Fehler im SQL-Kommando: $sql");

    // Formular darstellen
    if ($row=mysql_fetch_row($result))
    {
        echo "<form method=\"post\" action=\"tabelle-bearbeiten.php\">\n";
        echo "<br>Matrikelnummer: <input type=\"text\" name=\"matrnr\" readonly value=\"$row[0]\">\n";
        echo "<br>Name: <input type=\"text\" name=\"name\" value=\"$row[1]\">\n";
        echo "<br>Geburtsdatum: <input type=\"text\" name=\"gebdat\" value=\"$row[2]\">\n";
        echo "<br><br><input type=\"submit\" name=\"submit_eingabemaske\" value=\"Abschicken\">\n";
        echo "</form>\n";
    }
    else
        echo "Fehler: Matrikelnummer $_GET[id] nicht vorhanden\n";
?>
</body>
</html>