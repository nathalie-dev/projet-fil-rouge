<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette de cosmétiques et produits ménagers fait maison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
<link rel="stylesheet" href="./../assets/css/style.css">
</head>
<body>
<header></header>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <img src="assets\image\logo-feuille.png" class="navbar-brand">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php?page=cosmetique" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cosmetique</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=recette">Lister cosmétiques</a></li>
            <li><a class="dropdown-item" href="index.php?page=ajouterRecette">Ajouter une recette de cosmétique</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php?page=recette" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produit d'entretien</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=recette">Lister les produit d'entretien</a></li>
            <li><a class="dropdown-item" href="index.php?page=ajouterRecette">Ajouter un prouit d'entretien</a></li>
          </ul>
        </li>
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php?page=categorie" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégorie</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=categorie">Lister une catégorie</a></li>
            <li><a class="dropdown-item" href="index.php?page=ajouterCategorie">Ajouter une catégorie</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=utilisateur">Utilisateur</a>
</li>

    </div>
  </div>
</nav>
    

    <main class="container"><?=$content?></main>
    <footer>Nathalie ROBIN&copy2023</footer>
    
</body>
</html>



 