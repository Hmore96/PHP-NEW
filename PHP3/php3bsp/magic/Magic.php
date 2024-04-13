<?php

class Magic {

    //speichert alle Eigentschaften über __set(), die nicht
    // als selbstständige Eigenschaften exisitieren.
    private array $daten = array();
/**
 * Wird von außen eine Eigenschaft gesetzt, die es hier im Object nicht gibt, wird automatisch die __set() Magic-Method verwendet
 */
    public function __set($variable, $wert) {
        $this->daten[$variable] = $wert;
    }
/**
 * Wird von außen eine Eigenschaft VERWENDET, die es hier im Object nicht gibt, wird automatisch die __get() Magic-Method verwendet
 */
    public function __get($variable) {
        return $this->daten[$variable];
    }
// wird von außen eine Funktion aufgerufen
// die es hier im Objekt nicht gibt, wird automatisch
// die call()-Magic-Method verwendet.
    public function __call($methode, $parameter) {
        echo "Es wurde die Methode " .  $methode . " aufgerufen.";
        echo "<pre>";
        print_r($parameter);
        echo "</pre>";

    }
//Wird ein komplettes Object als String verwendet, z.B mit echo, so verwendet PHP 
//den Rückgabewert der toString- Magic-Method
    public function __toString() {
        return print_r($this->daten, true);
    }
}