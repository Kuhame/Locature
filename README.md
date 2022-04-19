![terminal-logos](./Location.svg)

# Locature (Site de location de voiture)

Ce répertoire contient les codes sources d'un projet réalisé dans le cadre d'un module de <strong>Programmation WEB</strong>
à l'[IUT de Paris - Rives de Seine](https://iutparis-seine.u-paris.fr/) en 2021.

Ce projet consiste à créer un site de location de voitures pour des entreprises clientes en suivant une architecture MVC en PHP et SQL.<br>
Toutes les pages du site ont été réalisés avec l'aide du framework [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Utilisation
> 🔴 Note: Il faut au préalable installer un serveur web comme [Laragon](https://laragon.org/) ou [WampServer](https://www.wampserver.com/).

Pour pouvoir lancer le projet, il faut suivre les étapes ci-dessous :

* Importer la base de données (bdd.sql) sur un serveur MySQL comme phpMyAdmin.
* Modifier le fichier connect.php dans le dossier m et mettre les identifiants pour vous connecter à votre serveur MySQL.
* Exécuter votre serveur web (UWAMP, LARAGON, ...) depuis la racine du projet ( dans le répertoire 'Version MVC (complete)' ).
* Ouvrir le fichier index.php sur le navigateur de votre choix.

### Connexion

Etant donné que les mots de passes sont cryptés en SHA-1, voici les identifiants vous permettant de vous connecter en tant que loueur
et tester les fonctionnalités qui lui sont propre :

> Email : antoine.clermont@gmail.com <br>
> MDP : 987654321<br>

## Versions

* PHP : 7.3.21
* MySQL : 5.7.31

