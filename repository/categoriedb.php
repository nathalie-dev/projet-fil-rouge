<?php

class CategorieDB{

    static public function lister(): Reponse
        {
            try
            {
           $stmt = Database::getInstance()->query("SELECT * FROM CATEGORIE;");
           $resultat = $stmt->fetchall();
           $listeCategorie = new ArrayObject();
           foreach($resultat as $key =>$value)
           {
                //var_dump($value);
                $categorie = new Categorie ($value ['id'],$value['libelle']);
                //var_dump ($categorie);
                $listeCategorie ->append($categorie);
           }
           return new Reponse ($listeCategorie);
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
            $stmt = Database ::getInstance()->query ("SELECT * FROM CATEGORIE WHERE ID=" . $pId. ";");
            $value = $stmt ->fetch();
            $resultat = new ArrayObject();
            if ($value!=false)
            {
            
            $categorie = new Categorie ($value ['id'],$value['libelle']);
            //var_dump($categorie);
            $resultat->append($categorie);
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
    
    if (!(isset($pData['libelle']) && (strlen($pData['libelle']) >= 4)))
            return false;
           
    try
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO categorie (libelle) values (:libelle);");
             $stmt->bindValue(':libelle',$pData['libelle']);
            return $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
   
}
static public function lesRecettes(int $pId): Reponse
        {
            if (!is_numeric($pId)||$pId<=0)
                return new Reponse (new ArrayObject());
            try
            {
 //               SELECT * FROM RECETTE, categorie, categoriser WHERE 
//categorie.id =1
//AND
//recette.id = categoriser.numRecette
//AND
//categorie.id =  categoriser.numCategorie;

            $stmt = Database ::getInstance()->query ("SELECT * FROM RECETTE, categorie, categoriser WHERE categorieID=" . $pId. " and recette.id = categoriser.numRecette and categorie.id = categoriser.numCategorie;");
            $value = $stmt ->fetch();
            $resultat = new ArrayObject();
            foreach ($value as $false)
            {
            // création de l'utilisateur ayant proposé la recette
            $utilisateur = new Utilisateur($value['idUtilisateur'], $value['nom'], $value['prenom']);

                // création de la recette a partir des datas de la requete
             $recette = new Recette($value['id'], $value['titre'], $value['listeIngredients'],$value['preparation'], $value['image'], $utilisateur);
           
            $resultat->append($recette);
            } 
            return  new Reponse ($resultat);
    
        }catch (PDOExeption $e) {
            return new Reponse (new ArrayObject(), $e);
        }
        
        }
    }


?>