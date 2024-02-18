**...ParrotGarage...**


**Proposition de conception de site internet pour un garage qui assure des services mécaniques et propose la vente de véhicules d'occasion.**


**Veuillez suivre les instructions ci-dessous pour procéder à l'installation et à la configuration du projet** :

Si symfony CLI est installer, veuillez suivre les instructions ci-dessous comme elle sont ecrite sinon remplacer "symfony" par "php bin/ "


**(A) Procédez à l'installation des packages requis pour le projet** :

- composer install 
 
- composer update


**(B) Pour la configuration de la base de données en environnement de développement, veuillez créer un fichier '.env.local' à la racine du projet et insérer la ligne suivante** :

DATABASE_URL="mysql://username:password@127.0.0.1:3306/nom_de_la_base_de_donnees?serverVersion=8.0.32&charset=utf8mb4"


**(C) Initialisez la base de données** :

- symfony console doctrine:database:create


**(D) Effectuez les migrations pour créer les tables de la base de données** :

- symfony console doctrine:migrations:migrate


**(E) Créez un administrateur directement dans la base de données (ex: MySQL Workbench)**
**avant de saisir votre mot de passe, vous devrez d'abord le hasher a l'aide de la ligne ci-dessous**:

- symfony console security:hash-password


**(F) ajouter les fixtures grace a l'aide la ligne ci-dessous ou renter directement les données dans l'espace administartion** :

- symfony console doctrine:fixtures:load


**(G) Pour démarrer le serveur, utilisez la commande suivante** :

- symfony server:start -d


**Pour faire fonctionner ce projet, vous devez utiliser les éléments suivants** :

- PHP : 8.2
- Composer : 2.6.3
- MySQL : 8.0.33
- Symfony : 7.0.3


**...FIN...**