<p align="center" width="400"><a href="#" target="_blank">EducateYoursef</a></p>

## Documentation pour faciliter l'utilisation de l'application

EducateYoursef est une plateforme web, le processus de formation en ligne.

Tout le monde peut l'utiliser, des visiteurs non connecté, des formateurs qui vont créé des formations, des administrateurs qui gérent tout.

## Installation : 

- Récupération du projet : 
	**git clone https://github.com/tahathedancer98/ProjetLaravelM1.git**
- Basculez bien sur la branche master : 
    **git checkout branch master**
- Installation du composer : 
	**composer update**
- Copiez le fichier **.env.example** et collez le, changez son nom en mettant **.env** et mettez les valeurs suivantes en fonction de vos paramètres de base de données : 
    **DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[Le nom de votre base de données]
    DB_USERNAME=[votre username]
    DB_PASSWORD=[votre mot de passe]
- Rajouter la partie mail dans **.env** : 
- - **MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=[votre username]
    MAIL_PASSWORD=[votre password]
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"**

## Laravel Sponsors

