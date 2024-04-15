<?php

class Produit
{
    protected $id, $nom, $type, $source, $prix, $unite;
    public function __construct(array $f){
        $this->id = $f["code_produit"];
        $this->nom = $f["nom_produit"];
        $this->type = $f[2];
        $this->source = $f[3];
        $this->prix = $f[4];
        $this->unite = $f[5];
    }
    public function toTable(){
        echo "<tr>
            <td>".$this->nom."</td>
            <td>".$this->type."</td>
            <td>".$this->source."</td>
            <td>".$this->prix.$this->unite."</td>
        </tr>";
    }
}