# La Compagnie des Guides — Back-office

Back-office d'administration de [La Compagnie des Guides](../README.md), développé avec
**Laravel 9** (PHP ≥ 8.0.2) et des vues Blade. Il gère le schéma de la base de données
(migrations et seeders), partagée avec le [front-office](../front-office).

## Fonctionnalités

Toutes les routes sont protégées par authentification (`auth`).

- CRUD des **guides**, **sommets**, **vallées**, **abris** et **ascensions**
- Consultation des **randonnées** (liste et détail)
- Gestion des utilisateurs : connexion, déconnexion, enregistrement

## Installation

Cloner le projet puis aller dans le dossier du back-office :

```
git clone https://github.com/LaurelineHenaff/guides-montagne.git
cd guides-montagne/back-office
```

Installer les dépendances :

```
composer install
npm install
```

Créer la base de données vide (par exemple `guidesmontagne`), interclassement : `utf8mb4_general_ci`.

Copier le fichier `.env.example` en `.env`, puis l'éditer avec le nom de la base et les
paramètres de connexion (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

Générer la clé de l'application :

```
php artisan key:generate --ansi
```

Lancer les migrations et les seeders :

```
php artisan migrate:fresh --seed
```

Compte administrateur par défaut : `admin` // `admin`.

## Lancement

```
npm run dev          # assets (Vite)
php artisan serve    # http://127.0.0.1:8000
```

Ou créer un `VirtualHost` qui pointe vers le dossier `public/` du projet (et mettre à
jour le fichier `hosts` si nécessaire).

## Structure

```
app/Http/Controllers/   # un contrôleur par ressource
app/Models/             # modèles Eloquent
database/migrations/    # schéma de la base (partagé avec le front-office)
database/seeders/       # données de test
resources/views/        # vues Blade
routes/web.php          # routes
```

_Laurine, Laureline, Christophe._
