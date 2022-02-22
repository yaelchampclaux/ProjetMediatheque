# ProjetMediatheque
Teach about dev and web environment, Symfony, Doctrine, Twig on a pratical example of building a small mediatheque

# Pre-requis Linux
Avoir installé docker et docker-compose

# Pre-requis Windows
Awoir installer Linux WSL et DockerDesktop

#1. lancer l'environnement (se placer dans le projet):
docker-compose -f docker-compose_x86.yml up --build

#2. Accéder au shell du conteneur PHP
docker exec –it php-mediatheque /bin/bash

#3. Installer les vendors symfony (dans site)
../composer.phar install

#4 Installer la base de données (faire une migration doctrine)
php bin/console doctrine:migrations:migrate

#5 Tester que ça fonctionne
#Accés au site
http://localhost:8811/
#Accés à PhpMyAdmin
http://localhost:8812/

## Autres commandes utiles

#Récupérer la dernière migration de la base de données (se place dans site) Exemple de réponse DoctrineMigrations\Version20220211020200
php bin/console doctrine:migrations:latest

#Commande pour accéder au shell du conteneur MySQL
docker exec –it db-mediatheque /bin/bash

#Accés au site
http://localhost:8811/

#Accés à PhpMyAdmin
http://localhost:8812/
