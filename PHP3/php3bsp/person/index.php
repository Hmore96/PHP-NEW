<?php 

include "Person.php";


$ich = new Person("Markus");
echo $ich->vorstellen();
echo "<br>";


$ich->set_vorname("Markus");
echo $ich->get_vorname();
echo "<br>";



$sie = new Person("Sabrina");
echo $sie->vorstellen();
echo "<br>";



