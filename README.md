# GroupeA

## Technologies :

* Symfony 4

## Installation :

* Clone repo
* cd /app
* composer install
* Config your .env file for your database connexion
* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:migrate
* php bin/console doctrine:fixtures:load
* php bin/console server:run

## Installation front :

* Installation de Ruby: https://rubyinstaller.org/downloads/
* commande: gem install sass
* commande: gem install compass
* npm install

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
