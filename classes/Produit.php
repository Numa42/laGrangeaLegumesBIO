<?php

class Produit
{
    protected $field;
    public function __construct(int $f){
        $this->field = $f;
    }
    public function toTable(){
        $oui =  implode(" | ", $this->fields);
        echo "<tr><td>".$oui."</td></tr>";
    }
}