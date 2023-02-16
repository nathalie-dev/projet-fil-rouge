<?php
class Cosmetique_maison
{
    public int $id;
    public String $titre;
    public String $listeIngredients;
    public String $preparation;
    public Utilisateur $createur;
    public String $image;

    public function __construct(int $pId,String $ptitre,String $plisteIngredients,String $pPreparation,String $pImage, Utilisateur $pCreateur)
    {
        $this->id=$pId;
        $this->titre =htmlentities($ptitre);
        $this->listeIngredients = htmlentities($plisteIngredients);
        $this->preparation = htmlentities($pPreparation);
        $this->image = $pImage;
        $this->createur =$pCreateur;
       
    }
    
public function __toString()
{
    return json_encode($this);
}
}
?>