<div class="card" style="width: 18rem;">
  <img src="assets/image/<?=$cosmetique->image?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$cosmetique->titre?></h5>
    <p class="card-text"><?=$cosmetique->listeIngredients?></p>
    
    <a href="index.php?page=cosmetique&id=<?=$cosmetique->id?>" class="btn btn-primary">Voir la recette complète</a>
    
  </div>
</div>