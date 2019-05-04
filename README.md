# Test de recrutement

Les fonctionnalités n'ont pas tous été développées dû à des projets
d'écoles en cours. Néanmoins il y a eu un avancé dans 
le projet. L'intervention notamment n'a pas pu être développé.

Pour fournir toutes les fonctionnalités indiquées, l'estimation de
temps serait de 40h pour améliorer le design du site ainsi que
de terminer les fonctionnalités. Aussi niveau sécurité de l'application. 
La gestion des droits, le controle des URLs, les logs sur le site ainsi que 
quelques attaques de sécurité connues. Soit 10h pour le design, 10h pour les fonctionnalités
20h pour une sécurité optimum avec des tests de fonctionnalités, d'UI et d'UX.

Ce test était un test qui permettait de faire ressortir les compétences
à tous les niveaux du développement WEB, depuis la conception, au déploiement
en passant par le développement, le design, la sécurité ainsi que le versionning.
Les difficultés rencontrés étaient seulement dans l'ordre du temps.

Pour faire fonctionner le projet
 - Ce projet est un projet PHP7.1 donc certains opérateurs ne fonctionneront pas sur les versions
 de PHP inférieur à PHP7 avec du HTML/CSS avec le framework Material Design for Bootstrap.
  La base de donnée utilisée est MySQL 5.7. Le projet suit une architecture MVC avec une programmation
  objet.
 - Démarrer son serveur de BD et apache
 - Il Faudrait d'abord exécuter le script de base de données disponible dans le fichier BD.sql
 - Ensuite configurer la BD selon son serveur dans le fichier Modeles\connexionBD.php
 - Déplacer le contenu du dossier src/ dans le répertoire www ou public_html de son serveur
 - Mettre l'URL http://localhost/recrutement-test sur un serveur local Laragon/Wamp ou l'adresse ip
 vers le répertoire du projet.
 - Les identifiants pour la connexion Admin sont (Username : admin, password: 123456789)
 Une version de l'application est disponible sur l'adresse http://recrutement-test.shadgramers.com hébergé sur un serveur
 CentOS 6 avec CPanel.
 
 Quelques erreurs : 
 - Si à la connexion à l'application à partir du login il est écrit : 404, vérifiez que vous avez selectionné un profil à la connexion.
 - Si au démarrage de l'application il y a une page blanche, activez l'affichage des erreurs sur le serveur. La cause peut être le fait 
 que les identifiants de connexion à la base de données fournis sont incorrects, que la base de données n'est pas accessible
 dû au blocage du port 3306 ou que la base de données n'est pas encore complètement lancé.
 - Si vous essayez d'enregistrer une voiture avec le profil Technicien, une erreur surviendra dû au fait qu'il n'a pas ce droit donc 
 neccessite obligatoirement la connexion avec le profil Gestionnaire.
 - Pour toutes autres erreurs, vous pouvez me contacter sur le mail soedjedefrido@gmail.com .
 - Si vous essayer d'accéder à une page et une redirection se fait sur la page d'acceuil qui contient les véhicules en maintenance c'est 
 que l'utilisateur connecté n'a pas le droit d'accéder à cette ressource.
 