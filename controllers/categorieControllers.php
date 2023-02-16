<?php
function afficherCategories()
{
  // Debut de la mise en cache
    ob_start();
    
   

    // Recuperation de la liste des categories
    $reponse = CategorieDB::lister();
    if ($reponse->isSuccessfull())
    // l'appel a CategorieDB:: lister() n'a pas provoquer d'erreur
    {
    $listeCategorie = $reponse->getData();
     // récupération des données: contient false si aucune donnée
    if ($listeCategorie)
      foreach($listeCategorie as $categorie)
    {
      include 'views/cardCategorie.php';
    }
    else
    include 'views/categorieNonTrouvee.php';
  }
  else
  // l'appel à CategorieDB::lister() a  provoqué une erreur
  include 'views/afficheUneException.php';

      $content = ob_get_clean();
      // fin mise en cache et affichage du layout avec la vue
      include 'views/layout.php';    
}
function afficherUneCategorie($pId)
{
   // Début de la mise en cache
  ob_start();
  // recuperation de la categorie
  $reponse = CategorieDB::lire($pId);
  if ($reponse->isSuccessfull())
  // l'appel à categorieDB:: lire() n'a pas provoquer d'erreur
        {
          // récupération des données: contient false si aucune donnée
          if ($reponse->isDataFound())
          {
            $categorie = $reponse->getData()[0];
            // recuperation des donnees: contient false si aucune donnee
            include 'views/afficherUneCategorie.php';
          }
          else 
            include 'views/categorieNonTrouvee.php';
        }
      else 
        // l'appel à CategorieDB::lire() a  provoqué une erreur
            include 'views/afficheUneException.php';
  $content = ob_get_clean();
  // fin mise en cache et affichage du layout avec la vue
  include 'views/layout.php';
}

function ajouterCategorie()
{
  //debut de la mise en cache
  ob_start();

  if (count($_POST)==0)
  {
    
    $_SESSION['codesecret'] =password_hash((time()+566655545),PASSWORD_DEFAULT);
    include 'views/afficherFormulaireCategorie.php';
  }
  else
  { 
    if (isset($_POST['codesecret']) && $_POST['codesecret']== $_SESSION['codesecret']) // acces licite
    {
    $resultat = CategorieDB::creer($_POST);
    if ($resultat)
  include 'views/categorieAjoutee.php';
  else
  {
 include 'views/afficherFormulaireCategorie.php';
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
