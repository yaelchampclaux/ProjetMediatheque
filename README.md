# ProjetMediatheque
Teach about dev and web environment, Symfony, Doctrine, Twig on a pratical example of building a small mediatheque

# Pre-requis Linux
Avoir installé docker et docker-compose

# Pre-requis Windows
Awoir installer Linux WSL et DockerDesktop

# Lancer l'environnement de développement

## 1. lancer l'environnement (se placer dans le projet):
docker-compose -f docker-compose_x86.yml up --build

## 2. Accéder au shell du conteneur PHP
docker exec –it php-mediatheque /bin/bash

## 3. Installer les vendors symfony (depuis /site)
../composer.phar install

## 4. Créer la base de données en synchronisant 
php bin/console doctrine:schema:update --force

## 5. Ajouter éventuellement des données dans la médiathèque (par PhpMyAdmin) 
importer le fichier fill-mediatheque.sql qui se trouve dans le dossier /data

## 6. Tester

### Accés au site
http://localhost:8811/

### Accés à PhpMyAdmin
http://localhost:8812/

# Autres commandes utiles

## Symfony

### Lister les commandes disponibles de la console Symfony
php bin/console list

### Récupérer la dernière migration de la base de données (se place dans site) Exemple de réponse DoctrineMigrations\Version20220211020200
php bin/console doctrine:migrations:latest

### Réaliser la migration
php bin/console doctrine:migrations:migrate

### Voir les routes du site
php bin/console debug:router

## Docker 

### Commande pour accéder au shell du conteneur MySQL
docker exec –it db-mediatheque /bin/bash

### Pour connaitre les processus running et exited
docker ps –a

### Pour stopper un container running (celui s’étei#nt proprement)
docker stop <container id> ou <container name>

### Pour stopper un container running immédiatement
docker kill <container id> ou <container name>

### Pour effacer un container stoppé
docker rm <container id> ou <container name>

### Restart un ou plusieurs containers
docker restart <container id1> <container id2> … ou <container name1>

### Stat d'utilisation
docker stat

### Verification de failles
docker scan
