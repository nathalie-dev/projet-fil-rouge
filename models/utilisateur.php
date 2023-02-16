<?php
class Utilisateur
{
   public int $id;
   public string $nom;
   public string $prenom;
   public function __construct(int $pId,String $pNom,String $pPrenom)

   {
        $this->id=$pId;
        $this->nom = htmlentities($pNom);
        $this->prenom = htmlentities($pPrenom);
   }

   public function __toString()
      {
         return json_encode($this);
      }
   
}
?>