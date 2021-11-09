<p align="center" width="400"><a href="#" target="_blank">EducateYoursef</a></p>

## Documentation pour faciliter l'utilisation de l'application

EducateYoursef est une plateforme web, le processus de formation en ligne.

Tout le monde peut l'utiliser, des visiteurs non connecté, des formateurs qui vont créé des formations, des administrateurs qui gérent tout.

## Installation : 

- Récupération du projet : <br/>
	**git clone https://github.com/tahathedancer98/ProjetLaravelM1.git**<br/><br/>
- Basculez bien sur la branche master : <br/>
    **git checkout branch master**<br/><br/>
- Installation du composer : <br/>
	**composer update**<br/><br/>
- Copiez le fichier **.env.example** et collez le, changez son nom en mettant **.env** et mettez les valeurs suivantes en fonction de vos paramètres de base de données : <br/>
    **DB_CONNECTION=mysql <br/>
    DB_HOST=127.0.0.1 <br/>
    DB_PORT=3306 <br/>
    DB_DATABASE=[Le nom de votre base de données] <br/>
    DB_USERNAME=[votre username] <br/>
    DB_PASSWORD=[votre mot de passe] ** <br/><br/>
- Rajouter la partie mail dans **.env** : <br/>
- - **MAIL_MAILER=smtp <br/>
    MAIL_HOST=smtp.mailtrap.io <br/>
    MAIL_PORT=2525 <br/>
    MAIL_USERNAME=[votre username] <br/>
    MAIL_PASSWORD=[votre password] <br/>
    MAIL_ENCRYPTION=tls <br/>
    MAIL_FROM_ADDRESS=null <br/>
    MAIL_FROM_NAME="${APP_NAME}"** <br/><br/>

## Laravel Sponsors

