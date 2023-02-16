<?php
function afficherUtilisateurs()
{   
  // Début de la mise en cache
    ob_start();
    // Récupération de la liste des recettes
    $reponse = UtilisateurDB::lister();
    if ($reponse->isSuccessfull())
    // l'appel à UtilisateurDB::lister() n'a pas provoqué d'erreur
    {
      $listeUtilisateurs = $reponse->getData();
      // récupération des données: contient false si aucune donnée
      if ($listeUtilisateurs)
        foreach($listeUtilisateurs as $utilisateur)
        {
          include 'views/cardUtilisateur.php';
        }
      else
      include 'views/utilisateurNonTrouve.php';
    }
    else
  // l'appel à UtilisateurDB::lister() a  provoqué une erreur
    include 'views/afficherException.php';
  
      $content = ob_get_clean();
      // fin mise en cache et affichage du layout avec la vue
     include 'views/layout.php';
}
function afficherUnUtilisateur($pId)
{
   // Début de la mise en cache
    ob_start();
     // Récupération de la recette
    $reponse = UtilisateurDB::lire($pId);
    if ($reponse->isSuccessfull())
     // l'appel à UtilisateurDB::lire() n'a pas provoqué d'erreur
      {
        if ($reponse->isDataFound())
        {
          $utilisateur = $reponse->getData()[0];
      // récupération des données: contient false si aucune donnée
     
        include 'views/afficherUnUtilisateur.php';
        }
          else
        include 'views/utilisateurNonTrouve.php';
      }
      else
      // l'appel à UtilisateurDB::lire() a  provoqué une erreur
      include 'views/afficherException.php';
    $content = ob_get_clean();
     // fin mise en cache et affichage du layout avec la vue
    include 'views/layout.php';
}
?>