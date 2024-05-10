<?php

namespace Markus\project_jobportal;

use Markus\project_jobportal\Mysql;

  class JobRowAbstract 
  {
    protected string $tabelle;

    private array $daten = array();
    public function __construct(array|int $id_oder_daten)
    {
        if (is_array($id_oder_daten)) {
            //fertiges array wurde gegeben, verwenden wie gegeben
            $this->daten = $id_oder_daten;
        } else {
            //id wurde übergeben, Daten aus Datenbank auslesen.
            $db = Mysql::getInstanz(); 
            $sql_id = $db->escape($id_oder_daten);
            $ergebnis = $db->query("SELECT * FROM {$this->tabelle} WHERE job_id = '{$sql_id}' ");
            $this->daten = $ergebnis->fetch_assoc();
        }
    }
    public function __get(string $eigenschaft): mixed
    {
        if(!array_key_exists($eigenschaft, $this->daten)) {
            throw new \Exception("Die Spalte {$eigenschaft} existiert in der Tabelle {$this->tabelle} nicht.");
        }

        return $this->daten[$eigenschaft];
    }

    public function entfernen(): void {
        $db = Mysql::getInstanz();
        $sql_id = $db->escape($this->id);
        $db->query("DELETE FROM {$this->tabelle} WHERE job_id = '{$sql_id}'");
    }

    public function speichern(): void 
     {
        $db = Mysql::getInstanz();
//Felder für SQL Abfrage zusammen bauen

        $sql_felder = "";
        foreach ($this->daten as $spaltenname => $wert) {
            if ($spaltenname == "job_id") { //spalten name "id" nie updaten oder inserten
                continue;
            }
            $sql_wert = $db->escape($wert);
            $sql_felder .= "{$spaltenname} = '{$sql_wert}',";
        }
        //r trim nimmt den letzten Beistrich von rechts weg.
        $sql_felder = rtrim($sql_felder, ", ");

        if(!empty($this->daten["job_id"])) {
            //in Datenbank bearbeiten
            $sql_id = $db->escape($this->daten["job_id"]);
            $db->query("UPDATE {$this->tabelle} SET {$sql_felder} WHERE job_id = '{$sql_id}'");
        }
        // in Db einfügen

            else {
                $db->query("INSERT INTO {$this->tabelle} SET {$sql_felder}");
            }
            
    }
 }