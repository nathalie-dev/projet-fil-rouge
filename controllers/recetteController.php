<?php
function afficherRecettes()
{
  // Debut de la mise en cache
    ob_start();
    
    //$json = file_get_contents('recette.json');
    //$recetteJson = json_decode($json);
    //$i=0;
    //foreach($recetteJson->recette as $recetteJson)
    // {
    // $recette = new Recette($i,$recetteJson->titre,$recetteJson->listeIngredients,$recetteJson->preparation);
    //include 'views/cardRecette.php';
    //   $i++;
    //  }

    // Recuperation de la liste des recettes
    $reponse = RecetteDB::lister();
    if ($reponse->isSuccessfull())
    // l'appel a RecettesDB:: lister() n'a pas provoquer d'erreur
    {
    $listeRecettes = $reponse->getData();
     // récupération des données: contient false si aucune donnée
    if ($listeRecettes)
      foreach($listeRecettes as $recette)
    {
      include 'views/cardRecette.php';
    }
    else
    include 'views/recetteNonTrouvee.php';
  }
  else
  // l'appel à RecetteDB::lister() a  provoqué une erreur
  include 'views/afficheUneException.php';

      $content = ob_get_clean();
      // fin mise en cache et affichage du layout avec la vue
      include 'views/layout.php';    
}
function afficherUneRecette($pId)
{
  //  ob_start();
  //  $json = file_get_contents('recette.json');
  //  $recetteJson =json_decode($json);
  //  $recette = new Recette($pId,$recetteJson->recette[$pId]->titre,$recetteJson->recette[$pId]->listeIngredients,$recetteJson->recette[$pId]->preparation);
  //  include 'views/afficherUneRecette.php';
  //  $content =ob_get_clean();
  //  include 'views/layout.php';

   // Début de la mise en cache
  ob_start();
   // Récupération de la recette
  $reponse = RecetteDB ::lire($pId);
  if ($reponse->isSuccessfull())
  // l'appel à RecetteDB::lire() n'a pas provoqué d'erreur
  {
    if ($reponse->isDataFound())
    {
      $recette = $reponse ->getData()[0]; 
      // récupération des données: contient false si aucune donnée
      include 'views/afficherUneRecette.php';
    }
    else 
    include 'views/recetteNonTrouvee.php';
  }
  else
     // l'appel à RecetteDB::lire() a  provoqué une erreur
  include 'views/afficheUneException.php';
  $content = ob_get_clean();
  // fin mise en cache et affichage du layout avec la vue
  include 'views/layout.php';
}

function ajouterRecette()
{
  //debut de la mise en cache
  ob_start();

  if (count($_POST)==0)
  {
    $utilisateur = UtilisateurDB:: lister()->getData();
    $_SESSION['codesecret'] =time();
    include 'views/afficherFormulaireRecette.php';
  }
  else
  { 
    if (isset($_POST['codesecret']) && $_POST['codesecret']== $_SESSION['codesecret']) // acces licite
    {
    $resultat = RecetteDB::creer($_POST);
    if ($resultat)
  include 'views/recetteAjoutee.php';
  else
  {
    $utilisateur = UtilisateurDB::lister()->getData();
 include 'views/afficherFormulaireRecette.php';
 }
}
else
echo "Vilain pirate je t'ai vu";
}
$content = ob_get_clean();
// fin mise en cache et affichage du layout avec la vue
include 'views/layout.php';
}
?>

