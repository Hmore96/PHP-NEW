<?php
namespace WIFI\JWE\Tier;
// eigener Namensraum für das Projekt, bzw. diese Klasse
// Wird verwendet um gleich benannte Klassen in verschiedenen Projekten zu erlauben
// Somit hat diese Klasse alle Möglichkeiten der Eltern-Klasse


// Abstract vor KLasse Heißßt
// diese Klasse muss "extended" werden.
// Sie kann nicht selbst als Object erstellt werden (instanziert)
  abstract class TierAbstract {
// Sichtbarkeitsmodifikatoren
// public: Kann von außen index.php zb gelesen und geändert werden
// protected: Diese Klasse und Kind-Klassen können die Eigenschaft verwedenn
// private: Ausschließlich diese Klasse kann die Eigenschaft verwenden.
private  readonly string $name; 
// readonly bei Eigenschaften
// Die Eigenschaft kann einmalih gesetzt werden (construct) und danach 
// nicht mehr geändert werden - nur gelesen.


public function __construct(string $tiername) {
    $this->name = $tiername;
}
/**
 * Constructor promotion seit php 8.0
 * public function __construct(private string $name) {}
 * Bei dieser Schreibweise muss man die Eigenschaft nicht mehr definieren
 * und die Zuweisung im Konstruktor passiert auch automatisch
 * ansonsten ist das Verhalten gleich wie oben
 */



    // wenn public final function: würde es geschütz sein, auch wenn Child mit Parent darauf zugreifen möchte.
    public function get_name():string {
        return $this->name;
    }
// Abstract vor methode heißt, diese Methode muss in Kind-Klassen implementiert werden.
    abstract public function gib_laut(): string;
 }

