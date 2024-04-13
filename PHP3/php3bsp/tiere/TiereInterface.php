<?php
namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;

//Ein Interface gibt einen Bauplan für eine Klasse vor.
//Wenn eine KLasse diese Interface verwendet, MUSS die Klasse all die
//hier enthaltenen Methoden einbauen.
interface TiereInterface {

public function add(TierAbstract $tier): void;

 }