# PROJECT_EVENT

Nom du projet
[Lucie]

Configuration requise
PHP [8.1]
Symfony [6.2]
[Autres dépendances]
Installation
Clonez ce dépôt de code sur votre machine locale.

bash
Copy code
git clone [https://github.com/Ricardogn224/PROJECT_EVENT.git]
Installez les dépendances du projet en exécutant la commande composer install.

bash
Copy code
composer install
Configurez votre base de données dans le fichier .env.

bash
Copy code
cp .env.dist .env
Créez la base de données en exécutant la commande php bin/console doctrine:database:create.

bash
Copy code
php bin/console doctrine:database:create
Exécutez les migrations pour créer les tables de la base de données en exécutant la commande php bin/console doctrine:migrations:migrate.

bash
Copy code
php bin/console doctrine:migrations:migrate
Lancez le serveur web local en exécutant la commande symfony server:start.

bash
Copy code
symfony server:start
Accédez à l'application dans votre navigateur web en allant à http://localhost:8000.

Utilisation
[Crée un compte ou faites une recherche d'un service, vous pourez ainsi proposer des services, faire des demandes et intéragir avec les prestataires qui proposent des services]


Remerciements
[KANIKAINATHAN Jerrinald | NJIAWOUO GBETNKOM Ahmed Karim |
HERNANDEZ SOMPARE Abraham Ricardo]

N'hésitez pas à personnaliser ce modèle en fonction des besoins de votre projet.
