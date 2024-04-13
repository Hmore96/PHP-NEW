<?php
class Statisch {


    //Eine statische Eigenschaft gehört zu 
    //einmal exisiterienden Klasse & nicht zum erstellten Object
    //dadurch bleibt die Eigenschaft über die gesamte laufzeit bestehen.

    public static int $id = 0;
//diese statische Methode wird asuch direkt der Klasse zugeordnet.
//WIe die EIgenschaft wird Sie über Statisch::setze_0() aufgerufen
//und kann nicht auf $this zugreifen- sie ist nicht Teil des Objects
    public static function setze_0(){
        self::$id = 0;
    }

    public function __construct() {
        self::$id++;

    }

    public function mache_etwas() {
        
    }
}