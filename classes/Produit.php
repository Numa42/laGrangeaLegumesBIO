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

    public function toForm(){
        # Fonction utilisée dans gestion.php
        $producteurDAO = new ProducteurDAO(MaBD::getInstance());

        echo "<form method='post'>
                <section class='form'>
                    <input type='hidden' name='id_produit' value=$this->id>
                    <section class='text'>
                        <input name='Code' type='text' value='$this->code' />
                        <input name='Nom' type='text' value='$this->nom' />
                        <input name='Type' type='text' value='$this->type' />
                        <input name='Fournisseur' type='text' value='' />
                        <input name='Prix' type='text' value='$this->prix' />
                        <input name='Unité' type='text' value='$this->unite' />
                    </section>
                    <input type='image' name='edit[]' class='btn-content' src='/assets/image/icon/edit.svg'>
                    <input type='image' name='remove[]' class='btn-content' src='../assets/image/icon/remove.svg'>
                </section>
        </form>";
//        $producteurDAO->getOne($this->source)->nom
    }

    public function getAll(){
        return array($this->id, $this->code, $this->nom, $this->type, $this->source, $this->prix, $this->unite);
    }
}