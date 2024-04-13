<?php

namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;
/**
 * Typdeklaration (Type-Hint): Tierabstract
 * Nur Objekte die von TieAbstract erben. oder selbst TierAbstract sind
 * dürfen als Arufment an diese methode übergeben werden. 
 */

class Tiere implements TiereInterface, \Iterator {
   
    private array $herde = array();
 public function add(TierAbstract $tier): void {
    $this->herde[] = $tier;
 }

    public function ausgabe(): string {
        $ret = "";
        foreach($this->herde as $tier) {
            $ret .= $tier->get_name();
            $ret .= " macht ";
            $ret .= $tier->gib_laut();
            $ret .= "<br>";
        }
        return $ret;
    }
// Iterator-INerface Implementierung
   private int $index = 0;

    public function current(): mixed {
        return $this->herde[ $this->index ];
    }
    public function next(): void {
        ++$this->index;
    }
    public function key(): mixed {
        return $this->$index;
    }
    public function rewind(): void {
        $this->index = 0;
    }
    public  function valid(): bool {
        return isset($this->herde [$this->index]);
    }


}