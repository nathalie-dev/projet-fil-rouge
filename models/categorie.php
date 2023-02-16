<?php
class Categorie
{
    public int $id;
    public String $libelle;

    public function __construct(int $pId,String $plibelle)
    {
        $this->id=$pId;
        $this->libelle =htmlentities($plibelle);
    }
    
    public function __toString()
    {
        return json_encode($this);
    }
    }
    ?>   