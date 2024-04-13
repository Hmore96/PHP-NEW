<?php 

// Klasse definieren, die später als Objekt verwendet werden kann
class Person {
    // Eigenschaft, Property festlegen:
    // Platzhalter fürm spätere Werte
    //private methoden können nur innerhalb der Klasse angesprochen werden
    private $vorname;

    //wird automatisch aufgerufen, sobald das Object erzeugt wird. 
    // __Constuct ist vorgefertigte 
    //öffentliche Methode, welche von außen angesprochen werden kann
    public function __construct($name) {
        $this -> vorname = $name;
    }


    public function vorstellen() {
        return "Hallo, ich bin " . $this->vorname;
    }
    //methode zum Holen des privaten Vornamens  genannt (getter)
    public function get_vorname(){
        return $this->vorname;
    }

    //methode zum Ändern des Vornamens, ein sogenannter (setter)
    public function set_vorname($neuer_name) {
        //durch diese Methode haben wir möglichkeit, überprüfungen vor dem setzen
        //des neuen Namens durchzuführen
        if ($this->vorname == $neuer_name) {
            echo "<strong>So heisse ich bereits!</strong>";
        } else 
            {$this->vorname = $neuer_name;}

    }

}

?>