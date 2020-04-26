# GroupeA

## Technologies

* Symfony 4
* Gulp
* Composer
* npm

## Installation

* Clone repo
* cd /app

### Backend

* composer install
* Config your .env file for your database connexion
* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:migrate
* php bin/console doctrine:fixtures:load
* php bin/console server:run

### Frontend

* Installation de Ruby: https://rubyinstaller.org/downloads/
* commande: gem install sass
* commande: gem install compass
* npm install
* gulp watch || gulp css (pour compiler les fichiers scss en auto ou compiler manuellement)

## Connexion :

* admin@admin.com
* toto

## URL admin :

* /admin


## Nommage des branches :

`fonctionnalités :`
* feature/1-create_project 

```
1 => numéro de l'issue 
create_project => titre le l'issue)
```

`Bug :`
* bugfix/1-create_project 


`Bug urgent :`
* hotfix/1-create_project 
