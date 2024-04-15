<?php

class Producteur
{
    public $id_producteur, $nom_producteur, $lien;

    public function __construct(array $f)
    {
        $this->id = $f["id_producteur"];
        $this->nom = $f["nom_producteur"];
        $this->lien = $f["lien"];
    }
}