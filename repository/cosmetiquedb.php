<?php

class CosmetiqueDB{

    static public function lister(): Reponse
        {
            try
            {
           $stmt = Database::getInstance()->query("SELECT *,utilisateur.id as 'idUtilisateur', cosmetique.id as 'idCosmetique' FROM COSMETIQUE, UTILISATEUR WHERE UTILISATEUR.ID = COSMETIQUE.numUtilisateur;");
           $resultat = $stmt->fetchall();
           $listeCosmetique = new ArrayObject();
           foreach($resultat as $key =>$value)
           {
                //var_dump($value);
                $utilisateur = new Utilisateur ($value['idUtilisateur'],$value['nom'],$value['prenom']);
                $cosmetique = new Cosmetique ($value ['idCosmetique'],$value['titre'],$value['listeIngredients'],$value['preparation'],$value['image'],$utilisateur);
                //var_dump ($cosmetique);
                $listeCosmetique ->append($cosmetique);
           }
           return new Reponse ($listeCosmetique);
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
            $stmt = Database ::getInstance()->query ("SELECT *,utilisateur.id as 'idUtilisateur', cosmetique.id as 'idCosmetique' FROM COSMETIQUE, UTILISATEUR WHERE UTILISATEUR.ID = COSMETIQUE.numUtilisateur AND COSMETIQUE.ID=".$pId.";");
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