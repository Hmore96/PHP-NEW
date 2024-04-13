<?php
/** 
 * Diese Blöcke sind Beispiele für "phpDoc" / "DocBlock"
 * und können mit phpDocumentor verarbeitet werden
 */
class Kreis {

    private $radius;
    
    const PI = 3.141592654;

    public function __construct(float $r){
        $this -> set_radius($r);
    }

    // der Desturktor wird auf jeden Fall ausgeführt, wenn das Object gelöscht wird.
    // Dies kann über unset() durch den Programmier passieren
    // oder automtisch durch PHP wenn das Programm zu Ende gelaufen ist.
    public function __destruct() {
        echo "Kreis mit Radius " . $this->radius . " wurde zerstört.<br>";
    }

    // self ist ein fixer Platzerhalter für den Klassennamen.
    public function flaeche() {
        //r² * PI
       return  pow($this->radius, 2) * self::PI;
    }
    
    public function durchmesser() {
        return  $this->radius * 2;
    }

    /**
     * Berchnet anhand des gegebenen Radius den Umfang des Kreises
     * @return float Der berechnete Umfang des Kreises.
     */
    public function umfang() {
        return  $this->radius * 2 * M_PI;
    }

    /** setzt einen neuen Wert für den Kreis
     * auch wenn der Kreis bereits existiert und mit einem Radius im Konstruktor befüllt wurde, kann man so einen neue
     * Radius setzen
     * @param  int|float  $r Der neue Radius der gesestzt werden soll.
     * @return void  
     * @throws Exception 
     */
    public function set_radius(float $neuer_radius): void {
        if($neuer_radius <= 0) {
            //wirft eine Exception, die als Fehler am Bildschirmaufscheint.
            //gibt Kollegen einen Hinweis, was sie falsch gemacht haben.
            throw new Exception("Radius muss größer  0 sein");
        }
        $this->radius = $neuer_radius;
    }
}