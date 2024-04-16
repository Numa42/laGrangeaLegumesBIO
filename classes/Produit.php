<?php

class Produit
{
    protected $id, $code, $nom, $type, $source, $prix, $unite;
    public function __construct(array $f){
        $this->id = $f["id_produit"];
        $this->code = $f["code_balance"];
        $this->nom = $f["nom_produit"];
        $this->type = $f["type_produit"];
        $this->source = $f["source"];
        $this->prix = $f["prix"];
        $this->unite = $f["unite"];
    }
    public function toTable(){
        # Fonction utilisée dans tarifs.php
        $producteurDAO = new ProducteurDAO(MaBD::getInstance());
        $str = $this->nom;
        if ($this->type !== ""){
            $str .= " (".$this->type.")";
        }            
        echo "<tr>
            <td>".$str."</td>
            <td>".$producteurDAO->getOne($this->source)->nom."</td>
            <td>".$this->prix.$this->unite."</td>
        </tr>";
    }
}