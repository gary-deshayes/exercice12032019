# Exercice du 12/03/2019 Deshayes Gary
Application qui sert d'examen Symfony 4

Le thème global permet de mettre en place des offres d'emplois, grâce à la création de compétences, jobs, contrats, offres et candidatures.

L'accès aux différentes section ce fait grâce au menu de navigation.

Il est possible de créer, modifier, supprimer et afficher chaque entités.

## Lancement du projet
1. Avoir composer d'installé sur l'ordinateur
2. Se déplacer dans le dossier du projet et taper 'composer install' en ligne de commande (installe toutes les dépendances)
3. Ensuite après avoir installé toutes les dépendances on peut utiliser 'php bin/console server:run' qui va lancer le serveur
4. Accéder à l'application grâce au lien donné par l'invite de commande (Section Créer la base de données ci-dessous surement requise au bon fonctionnement)

## Créer la base de données
1. Après avoir installé le projet grâce à composer install, nous pouvons lancer la commande 'php bin/console doctrine:database:create' qui va créer la base de données
2. Maintenant on lance la commande 'php bin/console doctrine:migrations:migrate' qui va modifier la base de données en fonction des entités (si aucune migration n'est disponible lancer 'php bin/console make:migration')
3. (En cas de problème d'accès à la base de données, celui-ci se fait dans le fichier .ENV)

### Erreurs rencontrées durant l'épreuve
1. Les offres n'arrivaient pas à persister les compétences liées à elles malgré une relation ManyToMany sur les deux tables.
Je n'ai pas trouvé la solution. (Lors de l'envoi du formulaire, les compétences étaient bien présentes sous formes de tableau de l'entité Offer, aucune erreurs ne ressortaient et les autres valeurs de Offer se mettaient bien à jour).

2. Je n'ai compris qu'a la fin de l'épreuve comment mettre en place le trait pour les Date, mais vu qu'il ne restait que 10 minutes je n'ai pas eu le temps de mettre à jour chaque controllers pour persister les dates, donc j'ai annuler cette partie et mis les Use DateTrait; dans chaque entités en commentaires 