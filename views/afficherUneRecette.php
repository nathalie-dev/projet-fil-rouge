<div class="card" style="width: 18rem;">
    <img src="assets/image/<?=$recette->image?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h1 class="card-text"><?=$recette->titre?></h1>
        <p class="card-text"><?=$recette->listeIngredients?></p>
        <p class="card-text"><?=$recette->preparation?></p>
        <p class="card-text">La recette de produit ménager est proposée par <?=$recette->createur->prenom?></p>
        <a href="index.php?page=utilisateur&id=<?=$recette->createur->id?>"><?=$recette->createur->prenom?></a></p>
    </div>
</div>