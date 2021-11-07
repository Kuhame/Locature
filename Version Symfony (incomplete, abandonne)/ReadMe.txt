Comment installer notre logiciel :

1°) Ouvrir le Projet avec symfony après avoir installé Symfony 5 et Composer
2°) Tapez dans la console la commande :”symfony server:start” (Lancement du server)
    Ne pas oublier de changer dans le fichier .env les caractéristique de votre outil de BD, 
    ex : Laragon, uwamp, wampserver, ect (nom utilisateur, mot de passe, le nom de la BD
    au choix) 
    comme ceci : “mysql://votre_nom_utilisateur:votre_mdp@127.0.0.1:3306/nom_de_la_base”

3°) Entrez la commande : “php bin/console doctrine:database:create”
4°) Entrez les commandes : ”php bin/console make:migration ” puis tapez Entrée.
5°) “php bin/console doctrine:migrations:migrate” puis tapez Entrée.
    “php bin/console doctrine:fixtures:load puis tapez “yes”  
    Et dernière étape pour accéder au site, cliquez sur lien ”127.0.0.1” fourni après avoir exécuté le server:start dans l'étape 2

Si vous rencontrez des problèmes suivez le tuto jusqu'à 7min30 dans le lien 'https://www.youtube.com/watch?v=UTusmVpwJXo&t=3182s'
