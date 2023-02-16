<form method="POST">
    <fieldset class="form-control">
    <legend>Création d'une recette de cosmétique</legend>
    <input class="form-control" type="text" name="titre" placeholder= "Titre de la recette"
    value ="<?=isset($_POST['titre'])?$_POST['titre']:"";?>">

    <input class="form-control" type="text" name="image" placeholder="nom du fichier"
    value ="<?=isset($_POST['image'])?$_POST['image']:"";?>">

    <div class="input-group">
  <span class="input-group-text">Ingrédients</span>
  <textarea class="form-control" aria-label="With textarea" name="listeIngredients"><?=isset($_POST['listeIngredients'])?$_POST['listeIngredients']:"";?></textarea>
</div>
    <div class="input-group">
  <span class="input-group-text">Préparation</span>
  <textarea class="form-control" aria-label="With textarea"  name="preparation"><?=isset($_POST['preparation'])?$_POST['preparation']:"";?></textarea>
</div>


    <select name="idUtilisateur" id="idUtilisateur">

        <?php
        foreach($utilisateur as $utilisateur):?>

<option value="<?=$utilisateur->id?>"<?=(isset($_POST['idUtilisateur']) && $_POST['idUtilisateur']==$utilisateur->id)?" SELECTED ":""?> >

<?=$utilisateur->prenom?> <?=$utilisateur->nom?>

</option>
<?php
endforeach;?>
</select>
<button class="btn btn-primary">Créer</button>
</fieldset>
<input type="hidden" name="codesecret" value="<?=$_SESSION['codesecret'];?>">
</form>