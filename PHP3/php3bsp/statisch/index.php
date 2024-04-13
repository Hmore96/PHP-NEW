<?php

include "Statisch.php";

$neu = new Statisch();
$neu2 = new Statisch();
$neu3= new Statisch();
$neu5 = new Statisch();
$neu6 = new Statisch();
$neu7 = new Statisch();

echo Statisch::$id;
echo "<br>";

Statisch::setze_0();
echo Statisch::$id;
