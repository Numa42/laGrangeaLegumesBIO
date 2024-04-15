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
        # Fonction utilisée dans tarifs.php
        $producteurDAO = new ProducteurDAO(MaBD::getInstance());
        echo "<tr>
            <td>".$this->nom." (".$this->type.")</td>
            <td>".$producteurDAO->getOne($this->source)->nom."</td>
            <td>".$this->prix.$this->unite."</td>
        </tr>";
    }
}