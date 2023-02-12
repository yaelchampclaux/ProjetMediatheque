# ProjetMediatheque
Teach about dev and web environment, Symfony, Doctrine, Twig on a pratical example of building a small mediatheque

# Pre-requis Linux
Avoir installé docker et docker-compose

# Pre-requis Windows
Avoir installer Linux WSL2 et DockerDesktop

(*) Quand vous lancez l'environnement depuis une fenêtre de commande Windows (cmd) ou une fenêtre Powershell 
Si vous avez le message composer-setup.php illisible lors du lancement des container (commande 1. ci-après)
C'est que windows ne fait pas la conversion entre fichier Unix et fichier Windows.
il faut changer les sauts de ligne Unix (LF) en sauts de ligne Windows (CRLF) du fichier composer-setup.php dans le dossier /php
Pour cela ouvrir composer-setup.php avec notepad++ aller dans Edition / Convertir les sauts de lignes / Covertir au format Windows (CR + LF)
Puis relancer la commande de lancement de l'environnement

# Conseils 
Taper les commandes plutôt que les copier-coller. En effet, lors de la copie de "docker exec –it php-mediatheque /bin/bash" (commande 2. ci-après),
Windows remplace le tiret de la commande (tiret du 6) par un tiret long ce qui provoque le message "Error: No such container: –it" 
Il suffit de remplacer le tiret par le tiret du 6 et relancer la commande

# Lancer l'environnement de développement dans WSL2 ou à partir de Git Bash ou dans un Linux ou à partir d'une fenêtre de commande Windows(*)

1. lancer l'environnement (se placer dans le dossier ProjetMediatheque de manière à voir le fichier docker-compose_x86.yml)

docker-compose -f docker-compose_x86.yml up --build

Attention à ne pas fermer la fenêtre dans laquelle s'exécutent les conatiners !!! 
Ovrir une autre fenêtre pour taper les commandes suivantes

2. Accéder au shell du conteneur PHP (dans une autre fenêtre de commande que celle où sont lancés les containers)

docker exec –it php-mediatheque /bin/bash

3. Installer les vendors symfony (depuis /site dans le container php)

../composer.phar install

Cela charge les dépendences décrites dans notre fichier composer.json. 
En effet elles ne sont pas dans le dépôt git car elle peuvent être générées avec la commande précédente

4. Créer la base de données en synchronisant (depuis /site dans le container php) 

php bin/console doctrine:schema:update --force

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

php bin/console list

### Récupérer la dernière migration de la base de données

php bin/console doctrine:migrations:latest
> Exemple de réponse DoctrineMigrations\Version20220211020200

### Réaliser la migration

php bin/console doctrine:migrations:migrate

### Réaliser une migration spécifique

php bin/console doctrine:migrations:migrate DoctrineMigrations\Version20220211020200

### Voir les routes du site

php bin/console debug:router

### Vider les caches 

php bin/console cache:clear

### Installer les assets (images, css, javascript) dans le dossier public

php bin/console assets:install

## Docker 

### Commande pour accéder au shell du conteneur MySQL

docker exec –it db-mediatheque /bin/bash

### Pour connaitre les processus running et exited

docker ps –a

### Pour stopper un container running (celui s’étei#nt proprement)

docker stop *container_id ou container_name*

### Pour stopper un container running immédiatement

docker kill *container_id ou container_name*

### Pour effacer un container stoppé

docker rm *container_id ou container_name*

### Restart un ou plusieurs containers

docker restart *container_id1 container_id2 ... ou container_name1 ...*

### Stat d'utilisation

docker stat

### Vérification de failles

docker scan
