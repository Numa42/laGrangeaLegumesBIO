<?php

class Formule
{
    public $num, $produit;

    public function __construct(array $f)
    {
        $this->num = $f["num_formule"];
        $this->produit = $f["id_produit"];
    }
}