<?php

class Produit
{
    protected $field;
    public function __construct(int $f){
        $this->field = $f;
    }
    public function toTable(){
//        $oui =  implode(" | ", $this->field);
        echo "<tr><td>".$this->field."</td></tr>";
    }
}