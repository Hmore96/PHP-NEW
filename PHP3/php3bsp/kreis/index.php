<?php
include "Kreis.php";

$k = new Kreis(3.0);

echo "Fl&aumlche: " . $k->flaeche(); 
echo "<br>";

echo "Umfang: " . $k->umfang(); 
echo "<br>";

echo "Durchmesser: " . $k->durchmesser(); 
echo "<br>";


$k->set_radius(5);
echo "Durchmesser NEU: " . $k->durchmesser();

echo "<br>";


// wird in einem try block eine exception geworfen, hat man mit catch die Möglichkeit, darauf zu reagieren.
$benutzer_eingabe = -2;
try {
$k->set_radius($benutzer_eingabe);
echo "Durchmesser zum Schluss: " . $k->durchmesser();
} catch (Exception $ex) {
    // fängt alle Exception-Objekte ab, die im try-block 
    // geworfen wurden: throw new Exception("..")
    echo "Da war was falsch: " . $ex->getMessage();
echo "<br>";

} finally {
    echo "Das wars wohl.<br>";
}

unset($k);
echo "Letzte Ausgabe<br>";