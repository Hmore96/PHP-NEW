<?php 

namespace WIFI\PHP3\Klassen\Model;
use WIFI\PHP3\Klassen\Mysql;
use WIFI\PHP3\Klassen\Model\Row\Fahrzeug;

class Fahrzeuge
{
    public function alle_fahrzeuge(): array
    {
        $alle_fahrzeuge = array();
        $db =  Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM fahrzeuge ORDER BY id ASC");
        while ($row = $ergebnis->fetch_assoc()) {
            $alle_fahrzeuge[] = new Fahrzeug($row);
        }
        return $alle_fahrzeuge;
    }
}