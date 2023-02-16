<?php

class UtilisateurDB{

    static public function lister():Reponse
    {
        try
        {
            $stmt = Database::getInstance()->query("select * from UTILISATEUR;");
            $resultat = $stmt->fetchall();
            $listeUtilisateur = new ArrayObject();
            foreach($resultat as $key =>$value)
            {
                 //var_dump($value);
                 $utilisateur = new Utilisateur ($value ['id'],$value['nom'],$value['prenom']);
                 //var_dump ($utilisateur);
                 $listeUtilisateur ->append($utilisateur);
            }
            return new Reponse ($listeUtilisateur);
         }  
         catch(PDOException $e)
         {
             //print_r('Gros problème'.$e ->getMessage());
             return new Reponse (new ArrayObject(),$e);
         }
     }
         
     static function lire(int $pId):Reponse
         {
             if (!is_numeric($pId)||$pId<=0)
                 return new Reponse (new ArrayObject());
             try
             {
             $stmt = Database ::getInstance()->query ("SELECT * FROM UTILISATEUR WHERE ID=".$pId.";");
             $value = $stmt ->fetch();
             if ($value!=false)
             {
             $utilisateur = new Utilisateur($value ['id'],$value['nom'],$value['prenom']);
             $resultat = new ArrayObject();
             $resultat ->append($utilisateur);
             return   new Reponse ($resultat);
         }
         else 
         return new Reponse (new ArrayObject());
         }
         catch(PDOException $e)
         {
             print_r('Gros problème'.$e ->getMessage());
             return new Reponse(new ArrayObject(),$e);
         }
     }
 }
 ?>