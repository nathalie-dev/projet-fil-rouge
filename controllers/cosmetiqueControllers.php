<?php
function afficherComestiques()
{
  // Debut de la mise en cache
    ob_start();

    // Recuperation de la liste des recettes
    $reponse = CosmetiqueDB::lister();
    if ($reponse->isSuccessfull())
    // l'appel a CosmetiqueDB:: lister() n'a pas provoquer d'erreur
    {
    $listeComestiques = $reponse->getData();
     // récupération des données: contient false si aucune donnée
    if ($listeComestiques)
      foreach($listeComestiques as $cosmetique)
    {
      include 'views/cardCosmetique.php';
    }
    else
    include 'views/cosmetiqueNonTrouvee.php';
  }
  else
  // l'appel à CosmetiqueDB::lister() a  provoqué une erreur
  include 'views/afficheUneException.php';

      $content = ob_get_clean();
      // fin mise en cache et affichage du layout avec la vue
      include 'views/layout.php';    
}
function afficherUnCosmetique($pId)
{
   // Début de la mise en cache
  ob_start();
   // Récupération de la recette
  $reponse = CosmetiqueDB ::lire($pId);
  if ($reponse->isSuccessfull())
  // l'appel à CosmetiqueDB::lire() n'a pas provoqué d'erreur
  {
    if ($reponse->isDataFound())
    {
      $cosmetique = $reponse ->getData()[0]; 
      // récupération des données: contient false si aucune donnée
      include 'views/afficherUnComestique.php';
    }
    else 
    include 'views/cosmetiqueNonTrouvee.php';
  }
  else
     // l'appel à cosmetiqueDB::lire() a  provoqué une erreur
  include 'views/afficheUneException.php';
  $content = ob_get_clean();
  // fin mise en cache et affichage du layout avec la vue
  include 'views/layout.php';
}

function ajouterCosmetique()
{
  //debut de la mise en cache
  ob_start();

  if (count($_POST)==0)
  {
    $utilisateur = UtilisateurDB:: lister()->getData();
    $_SESSION['codesecret'] =time();
    include 'views/afficherFormulaireComestique.php';
  }
  else
  { 
    if (isset($_POST['codesecret']) && $_POST['codesecret']== $_SESSION['codesecret']) // acces licite
    {
    $resultat = ComestiqueDB::creer($_POST);
    if ($resultat)
  include 'views/recetteAjoutee.php';
  else
  {
    $utilisateur = UtilisateurDB::lister()->getData();
 include 'views/afficherFormulaireCosmetique.php';
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