<?php 

namespace WIFI\PHP3\Klassen\Model;
use WIFI\PHP3\Klassen\Mysql;
use WIFI\PHP3\Klassen\Model\Row\Marke;

class Marken
{
    public function alle_marken(): array
    {
        $alle_marken = array();
        $db =  Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM marken ORDER BY hersteller ASC");
        while ($row = $ergebnis->fetch_assoc()) {
            $alle_marken[] = new Marke($row);
        }
        return $alle_marken;
    }
}