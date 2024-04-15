<?php

class Produit
{
    protected $field;
    public function __construct(array $f){
        $this->field = $f;
    }
    public function toTable(){
        $oui =  implode(" | ", $this->field);
        echo "<tr><td>".$oui."</td></tr>";
    }
}