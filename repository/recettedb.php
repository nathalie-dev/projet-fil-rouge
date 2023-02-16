<?php

class RecetteDB{

    static public function lister(): Reponse
        {
            try
            {
           $stmt = Database::getInstance()->query("SELECT *,utilisateur.id as 'idUtilisateur', recette.id as 'idRecette' FROM RECETTE, UTILISATEUR WHERE UTILISATEUR.ID = RECETTE.numUtilisateur;");
           $resultat = $stmt->fetchall();
           $listeRecette = new ArrayObject();
           foreach($resultat as $key =>$value)
           {
                //var_dump($value);
                $utilisateur = new Utilisateur ($value['idUtilisateur'],$value['nom'],$value['prenom']);
                $recette = new Recette ($value ['idRecette'],$value['titre'],$value['listeIngredients'],$value['preparation'],$value['image'],$utilisateur);
                //var_dump ($recette);
                $listeRecette ->append($recette);
           }
           return new Reponse ($listeRecette);
        }  
        catch(PDOException $e)
        {
            //print_r('Gros problème'.$e ->getMessage());
            return new Reponse (new ArrayObject(),$e);
        }
    }
        
    static public function lire(int $pId): Reponse
        {
            if (!is_numeric($pId)||$pId<=0)
                return new Reponse (new ArrayObject());
            try
            {
            $stmt = Database ::getInstance()->query ("SELECT *,utilisateur.id as 'idUtilisateur', recette.id as 'idRecette' FROM RECETTE, UTILISATEUR WHERE UTILISATEUR.ID = RECETTE.numUtilisateur AND RECETTE.ID=".$pId.";");
            $value = $stmt ->fetch();
            $resultat = new ArrayObject();
            if ($value!=false)
            {
            $utilisateur =new Utilisateur($value['idUtilisateur'],$value['nom'],$value['prenom']);
            
            $recette = new Recette($value ['idRecette'],$value['titre'],$value['listeIngredients'],$value['preparation'],$value['image'],$utilisateur);
            //var_dump($recette);
            $resultat->append($recette);
            return  new Reponse ($resultat);
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

static public function creer($pData):bool
{
    //var_dump($pData);
    //array(5) { ["titre"]=> string(1) "d" ["image"]=> string(1) "d" ["listeIngredients"]=> string(1) "d" ["preparation"]=> string(1) "d" ["idUtilisateur"]=> string(1) "1" }
    if (!(isset($pData['titre']) && (strlen($pData['titre']) > 15)))
            return false;
            if (!(isset($pData['image']) && (strlen($pData['image']) > 15)))
            return false;
            if (!(isset($pData['listeIngredients']) && (strlen($pData['listeIngredients']) > 15)))
            return false;
            if (!(isset($pData['preparation']) && (strlen($pData['preparation']) > 15)))
            return false;
            if (!(isset($pData['idUtilisateur']) && is_numeric($pData['idUtilisateur'])))
            return false;

    try
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO recette (titre,listeIngredients,preparation,image,numUtilisateur)values (:titre,:listeIngredients,:preparation,:image,:idUtilisateur);");
             $stmt->bindValue(':titre',$pData['titre']);
             $stmt->bindValue(':listeIngredients',$pData['listeIngredients']);
             $stmt->bindValue(':preparation',$pData['preparation']);
             $stmt->bindValue(':image',$pData['image']);
             $stmt->bindValue(':idUtilisateur',$pData['idUtilisateur']);
            return $stmt->execute($pData);
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
   
}
}
?>