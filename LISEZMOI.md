# ProjetMediatheque
TP d'ingénierie informatique du Master2 IIN de L'Université Jean Jaures.\ 
Support pour la Découverte de Docker, Symfony (Doctrine, Twig), Git. 

# Pre-requis Linux & Mac
Avoir installé docker et docker-compose

# Pre-requis Windows
Avoir installer Linux WSL2 et DockerDesktop

# Utilisation

## Utilisateurs WSL, Linux, MAC
Ce tp est fait pour fonctionner dans WSL (ou linux ou mac).

## Utilisateurs Windows (cmd, powershell)
Il est également possible de le lancer depuis une fenêtre de commande Windows (cmd) ou une fenêtre Powershell\
Pour cela il faut (avant de lancer la commande 1. ci-après) remplacer les sauts de ligne Unix (LF) en sauts de ligne Windows (CRLF) du fichier composer-setup.php dans le dossier /php\
On peut le faire avec notepad++ via Edition / Convertir les sauts de lignes / Covertir au format Windows (CR + LF), sans oublier d'enregistrer le fichier\

Cela évite l'erreur "=> ERROR [www 7/9] RUN php composer-setup.php" lors du lancement des containers

Autre erreur connue : "Error: No such container: –it" \
Lors du collage de la commande "docker exec –it php-mediatheque /bin/bash" (commande 2. ci-après),\
Windows remplace le tiret de la commande (tiret du 6) par un tiret long qui provoque le message d'erreur\
Solution : Taper les commandes plutôt que les copier-coller.

# Cloner le projet 

``git clone https://github.com/yaelchampclaux/ProjetMediatheque.git``

# Lancer l'environnement de développement 

Se placer dans le dossier ProjetMediatheque de manière à voir le fichier docker-compose_x86.yml\à partir d'une fenêtre de commande Windows(*)

``docker-compose -f docker-compose_x86.yml up --build``

Attention à ne pas fermer la fenêtre dans laquelle s'exécutent les conatiners !!! 
Ouvrir une autre fenêtre pour taper les commandes suivantes

# Utiliser l'environnement 

1. Accéder au shell du conteneur PHP (dans une autre fenêtre de commande que celle où sont lancés les containers)

``docker exec –it php-mediatheque /bin/bash``

2. Installer les vendors symfony

``cd  site``\
``../composer.phar install``

Cela charge les dépendences décrites dans notre fichier composer.json. 
En effet elles ne sont pas dans le dépôt git car elle peuvent être générées avec la commande précédente\
Remarque : une fois que vous avez généré les vendors, ils seront dans le volume attaché à votre container.\ 
Vous n'aurez pas à les générer à nouveau sauf si vous ajoutez de nouveaux. 

4. Créer la base de données en synchronisant (depuis /site dans le container php) 

``php bin/console doctrine:schema:update --force``

Cela permet de générer la base de donnés dans MySQL à partir de notre code (les Entity dans le dossier /src de notre site)

5. Ajouter les données dans la médiathèque (par PhpMyAdmin) 

Avec votre navigateur aller dans phpMyAdmin http://localhost:8812/
Puis cliquer sur Importer puis parcourir, puis sélectionner le fichier fill-mediatheque.sql qui se trouve dans le dossier /data du ProjetMediatheque

6. Tester

    - Accés au site http://localhost:8811/

    - Accés à PhpMyAdmin http://localhost:8812/

# Autres commandes utiles

## Symfony 

Pour les commandes suivantes, on considère que l'on est placé dans le dossier /site du container php-mediatheque 

### Lister les commandes disponibles de la console Symfony

``php bin/console list``

### Récupérer la dernière migration de la base de données

``php bin/console doctrine:migrations:latest``
> Exemple de réponse DoctrineMigrations\Version20220211020200

### Réaliser la migration

``php bin/console doctrine:migrations:migrate``

### Réaliser une migration spécifique

``php bin/console doctrine:migrations:migrate DoctrineMigrations\Version20220211020200``

### Voir les routes du site

``php bin/console debug:router``

### Vider les caches 

``php bin/console cache:clear``

### Installer les assets (images, css, javascript) dans le dossier public

``php bin/console assets:install``

## Docker 

``Commandes pour gérer les containers``

### Commande pour accéder au shell du conteneur MySQL

``docker exec –it db-mediatheque /bin/bash``

### Pour connaitre les processus running et exited

``docker ps –a``

### Pour stopper un container running (celui s’éteint proprement)

``docker stop *container_id ou container_name*``

### Pour stopper un container running immédiatement

``docker kill *container_id ou container_name*``

### Pour effacer un container stoppé

``docker rm *container_id ou container_name*``

### Restart un ou plusieurs containers

``docker restart *container_id1 container_id2 ... ou container_name1 ...*``

### Stat d'utilisation

``docker stat``

### Vérification de failles

``docker scan``
