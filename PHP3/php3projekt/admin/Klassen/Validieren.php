<?php 
namespace WIFI\PHP3\Klassen;

class Validieren
{

    private array $errors = array();

    public function ist_ausgefuellt(string $wert, string $feldname): bool
    {
        if (empty($wert)){
            $this->errors[] =  $feldname ." war leer."; 
            return false;
        }
        return true;
    }

    public function ist_kennzeichen(string $wert, string $feldname)
    {
        // nach irgendeinem Zeichen im Kennwort suchen, das nicht A-Z, 0-9 oder Bindestrich ist.
        if(preg_match("/[^A-Z0-9\-]/i", $wert)) {
            $this->errors[] = "Im " . $feldname . " sind nur Buchstaben, Zahlen und Minus erlaubt";
            return false;
        }
        if(strlen($wert) > 8 || strlen($wert) < 3) {

            $this->errors[] = "Die Länge von " . $feldname . " scheint falsch zu sein.";
        }
        return true;
    }

    public function ist_jahr(string $wert, string $feldname)
       {
        if ($wert > date("Y") ||  $wert < 1850){
            $this->errors[] = "Das " . $feldname . " muss in der Vergangenheit liegen";
            return false;
        }
        return true;
        
    
    
    
    
    
    
    }

    public function fehler_hinzu(string $fehler): void
    {
        $this->errors[] = $fehler;
    }

    public function fehler_aufgetreten(): bool 
    {
        if(empty($this->errors))  {
            return false;
        }
        return true;
    }

    public function fehler_html(): string
    {
        if(!$this->fehler_aufgetreten()) {
            return "";
        }

        $ret = "<ul>";
        foreach ($this->errors as $error) {
            $ret .=  "<li>" . $error. "</li>";
        }
        $ret .= "</ul>";
        return $ret;
    }
}