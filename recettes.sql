-- creation database
CREATE DATABASE IF NOT EXISTS myrecipedb;
 
 USE myrecipedb;
 -- creation de la table recette
 DROP TABLE IF EXISTS recette;
 CREATE TABLE IF NOT EXISTS recette
 (
    idrecette INT primary key AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    listeIngredients MEDIUMTEXT NOT NULL,
    preparation MEDIUMTEXT NOT NULL
);

 DROP TABLE IF EXISTS cosmetique maison;
 CREATE TABLE IF NOT EXISTS cosmetique maison
 (
    idrecette INT primary key AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    listeIngredients MEDIUMTEXT NOT NULL,
    preparation MEDIUMTEXT NOT NULL
);
-- ajout de recettes
insert into recette (titre, listeIngredients,preparation)
values ('Produit à vitres', '40 cl de vinaigre blanc, 10 cl d’eau','Pour réaliser un produit à vitres, tout ce qu’il vous faut c’est 40 cl de vinaigre blanc, que vous mélangerez à 10 cl d’eau. Vous n’aurez plus qu’à vaporiser ce mélange sur vos vitres et passer un coup de chiffon ou de raclette.' );

DROP TABLE if EXISTS UTILISATEUR;
CREATE TABLE IF NOT EXISTS UTILISATEUR
(
    id INT primary key AUTO_INCREMENT,
    nom VARCHAR(250) NOT NULL,
    prenom VARCHAR(250) NOT NULL
)

insert into UTILISATEUR (nom, prenom)
values ('ROBIN','Nathalie'), ('DUPONT','Emilie'), ('DURAND','Marie');