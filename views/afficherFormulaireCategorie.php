<form method="POST">
    <fieldset class="form-control">
    <legend>Categorie</legend>
    <input class="form-control" type="text" name="libelle" placeholder= "Titre de la catégorie"
    value ="<?=isset($_POST['libelle'])?$_POST['libelle']:"";?>">

</select>
<button class="btn btn-primary">Créer</button>
</fieldset>
<input type="hidden" name="codesecret" value="<?=$_SESSION['codesecret'];?>">
</form>