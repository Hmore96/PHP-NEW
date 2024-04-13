<?php
namespace WIFI\JWE\Tier;

// extends Tier Abstract kopiert alle Eigenschaften und Methoden von  der 
// übergeordneten "TierAbstract" Klasse (die nicht private sind)
// somit hat diese Klasse alle Möglichkeiten der Eltern-Klasse
class Maus extends TierAbstract {


    // Wenn eine Methode definiert wird, die im selben Namen in der
    // Elternklasse bereits exisistiert, so wird diese überschrieben
public function get_name(): string {
    // parten:: get_name() ruf von der Elternklasse (TierAbstract)
    // die Methode get_name() auf und wir können den Rückgabewert
    // in unserer überschriebenen Methode weiter verwenden.

    $name = parent::get_name();
    return $name . "(Maus)";

}

    public function gib_laut(): string {
        return "Piep";
    }

}