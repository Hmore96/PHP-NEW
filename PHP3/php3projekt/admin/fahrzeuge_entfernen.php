<?php
include "setup.php";
ist_eingeloggt();


use WIFI\PHP3\Klassen\Model\Row\Fahrzeug;
include "kopf.php";

echo "<h1>Fahrzeug entfernen</h1>";



$fahrzeug = new Fahrzeug($_GET["id"]);

if ( !empty($_GET["doit"]) ) {
    //Bestätigungslink wurde geklickt -> wirklich in DB löschen
    $fahrzeug->entfernen();
    echo "<p>Fahrzeug wurde erfolgreich entfernt.<br>
    <a href='fahrzeuge_liste.php'>Zurück zur Liste</a>
    </p>";

} else  {
        echo "<p>Sind Sie sicher, dass sie das Fahrzeug mit dem Kennzeichen <strong> " . $fahrzeug->kennzeichen . " und der Marke " . $fahrzeug->get_marke()->hersteller . " sowie der Farbe " . $fahrzeug->farbe . " & dem Bausjahr " . $fahrzeug->baujahr ."</strong> entfernen möchten?"
            ."</p>";
        echo "<p>"
            . "<a href='fahrzeuge_liste.php'>Nein, abbrechen.</a>
            <a href='fahrzeuge_entfernen.php?id={$fahrzeug->id}&amp;doit=1'>Ja, sicher.</a>"
            ."</p>";
    }

include "fuss.php";