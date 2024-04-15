<?php

class Produit
{
    protected $id, $nom, $type, $source, $prix, $unite;
    public function __construct(array $f){
        $this->id = $f["code_produit"];
        $this->nom = $f["nom_produit"];
        $this->type = $f["type_produit"];
        $this->source = $f["source"];
        $this->prix = $f["prix"];
        $this->unite = $f["unite"];
    }
    public function toTable(){
        $producteurDAO = new ProducteurDAO(MaBD::getInstance());

        echo "<tr>
            <td>".$this->nom."</td>
            <td>".$this->type."</td>
            <td>".$this->source."</td>
            <td>".$this->prix.$this->unite."</td>
        </tr>";
    }
}