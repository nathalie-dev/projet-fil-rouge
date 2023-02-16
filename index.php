<?php
require_once 'config/config.php';

require_once 'repository/database.php';
require_once 'repository/reponse.php';
require_once 'repository/recettedb.php';
require_once 'repository/categoriedb.php';
require_once 'repository/cosmetiquedb.php';

require_once 'models/recette.php';
require_once 'models/categorie.php';
require_once 'models/cosmetique.php';

require_once 'controllers/recetteController.php';
require_once 'controllers/categorieControllers.php';
require_once 'controllers/cosmetiqueControllers.php';

require_once 'repository/utilisateurdb.php';
require_once 'models/utilisateur.php';
require_once 'controllers/utilisateurController.php';


session_start();

 if (isset($_GET['page']))
 $page = $_GET['page'];
 else
$page ='recette';

switch($page)
{
  case 'recette':
    if (isset($_GET['id']))
          afficherUneRecette($_GET['id']);
    else
          afficherRecettes();
          break;

  case 'categorie':
    if (isset($_GET['id']))
                  afficherUneCategorie($_GET['id']);
     else
           afficherCategories();
           break;

    case'utilisateur':
        if(isset($_GET['id'])) 
            afficherUnUtilisateur($_GET['id']);
            else
            afficherUtilisateurs();
            break;
    case 'ajouterRecette':
      ajouterRecette();
      break;
      

    case 'ajouterCategorie':
      ajouterCategorie();
      break;
      default: afficherCategories();break;
}

  ?>
</body>
</html>