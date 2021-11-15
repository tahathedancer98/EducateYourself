<p align="center" width="400"><a href="#" target="_blank">EducateYoursef</a></p>

## Documentation pour faciliter l'utilisation de l'application

EducateYoursef est une plateforme web, le processus de formation en ligne.

Tout le monde peut l'utiliser, des visiteurs non connecté, des formateurs qui vont créé des formations, un administrateur qui gére tout.
## MCD : 
- Un Admin peut <br/>
    - Ajouter/modifier/supprimer des formations/catégories/chapitres <br/>
    - Valider les comptes des visiteurs pour qu'il deviennent des formateurs <br/>
    - Gérer son compte <br/>

- Un Formateur peut gérer ses formations (Ajouter / Modifier / Supprimer) et gérer son compte <br/>
- Un visiteur peut visionner toutes les formations et naviguer entre ses chapitres <br/>
<img src="./MCD.png">

## Installation :
(Tous ce qui est en **gras** il faut le mettre dans la console)
- Récupération du projet : <br/>
  **git clone https://github.com/tahathedancer98/EducateYourself.git**<br/><br/>
- Accedez au répértoire du projet : <br/>
  **cd EducateYourself**<br/><br/>
- Basculez bien sur la branche master : <br/>
  **git checkout master**<br/><br/>
- Installation du composer : <br/>
  **composer update**<br/><br/>
- Copiez le fichier **.env.example** et collez le, changez son nom en mettant **.env** et mettez les valeurs suivantes en fonction de vos paramètres de base de données : <br/>
  **DB_CONNECTION=mysql <br/>
  DB_HOST=127.0.0.1 <br/>
  DB_PORT=3306 <br/>
  DB_DATABASE=[Le nom de votre base de données] <br/>
  DB_USERNAME=[votre username] <br/>
  DB_PASSWORD=[votre mot de passe]** <br/><br/>
- Rajouter la partie mail dans **.env** : <br/>
  **MAIL_MAILER=smtp <br/>
  MAIL_HOST=smtp.mailtrap.io <br/>
  MAIL_PORT=2525 <br/>
  MAIL_USERNAME=[votre username] <br/>
  MAIL_PASSWORD=[votre password] <br/>
  MAIL_ENCRYPTION=tls <br/>
  MAIL_FROM_ADDRESS=null <br/>
  MAIL_FROM_NAME="${APP_NAME}"** <br/><br/>
- Migration (Création des tables + remplir les données): <br/>
  **php artisan migrate:fresh --seed**<br/><br/>
    
## Lancement de l'application
- **php artisan serve**<br/>
## Les comptes de test
- **Administrateur**<br/>
    - Email : admin@admin.com <br/>
    - Mot de passe : admin <br/><br/>
- **Formateur 1** <br/>
    - Email : user@user.com <br/>
    - Mot de passe : password

## Les fonctionnalités :
- **Admin** : 
    - Créer, modifier, supprimer des formations, catégories, chapitres.
    - Modifier son profil.

- **Formateur** :
    - Créer, modifier, supprimer une formation.
    - Modifier son profil.
- **Visiteur** :
    - Visualiser les formations, et suivre une formation en naviguant dans ses chapitres.


## Des précisions :
- Au moment du lancement de l'application pour la premiere fois, il faut juste modifier les images des 3 formations de bases.
- Le reste marche bien.
