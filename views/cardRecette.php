<div class="card" style="width: 18rem;">
  <img src="assets/image/<?=$recette->image?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$recette->titre?></h5>
    <p class="card-text"><?=$recette->listeIngredients?></p>
    
    <a href="index.php?page=recette&id=<?=$recette->id?>" class="btn btn-primary">Voir la recette complète</a>
    
  </div>
</div>

