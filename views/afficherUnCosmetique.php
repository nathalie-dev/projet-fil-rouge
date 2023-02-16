<div class="card" style="width: 18rem;">
    <img src="assets/image/<?=$cosmetique->image?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h1 class="card-text"><?=$cosmetique->titre?></h1>
        <p class="card-text"><?=$cosmetique->listeIngredients?></p>
        <p class="card-text"><?=$cosmetique->preparation?></p>
        <p class="card-text">La recette de cosmétique est proposée par <?=$cosmetique->createur->prenom?></p>
        <a href="index.php?page=utilisateur&id=<?=$cosmetique->createur->id?>"><?=$cosmetique->createur->prenom?></a></p>
    </div>
</div>