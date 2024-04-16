<?php

class Compte
{
    public $identifiant, $mot_de_passe;

    public function __construct(array $f)
    {
        $this->identifiant = $f["identifiant"];
        $this->mot_de_passe = $f["mot_de_passe"];
    }
}