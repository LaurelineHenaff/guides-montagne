# La Compagnie des Guides

Application de gestion d'une compagnie de guides de montagne : guides, sommets,
vallées, abris, ascensions, randonnées et réservations.

Le projet est composé de deux applications qui partagent la même base de données MySQL.

| Application | Rôle | Technologies |
|---|---|---|
| [`back-office/`](back-office) | Administration des données (CRUD) | Laravel 9, PHP ≥ 8.0.2, Blade |
| [`front-office/`](front-office) | Consultation des guides et des sommets, gestion des randonnées et des réservations | Spring Boot 3.0.4, Java 19, Spring Data JPA, JSP |

## Structure du dépôt

```
guides-montagne/
├── back-office/   # Application Laravel
└── front-office/  # Application Spring Boot (packaging WAR)
```

## Prérequis

- PHP 8.0.2+ et [Composer](https://getcomposer.org/)
- Node.js et npm (assets du back-office)
- JDK 19 (le wrapper Maven `mvnw` est fourni)
- MySQL ou MariaDB

## Base de données

Les deux applications utilisent la même base. Le schéma et les données de test
sont créés par le back-office (migrations et seeders Laravel).

1. Créer la base : `CREATE DATABASE guidesmontagne CHARACTER SET utf8mb4;`
2. Lancer les migrations du back-office (voir ci-dessous).

Tables principales : `guides`, `sommets`, `vallees`, `abris`, `ascension`,
`randonnees`, `concerner`, `reserver`, `users`.

## Back-office (Laravel)

```bash
cd back-office
cp .env.example .env        # puis renseigner DB_DATABASE=guidesmontagne, DB_USERNAME, DB_PASSWORD
composer install
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve           # http://127.0.0.1:8000
```

Fonctionnalités (authentification requise) :
- CRUD des guides, sommets, vallées, abris et ascensions
- Consultation des randonnées
- Gestion des utilisateurs (connexion, déconnexion, enregistrement)

## Front-office (Spring Boot)

```bash
cd front-office
# adapter si besoin src/main/resources/application.properties (URL, utilisateur, mot de passe MySQL)
./mvnw spring-boot:run      # http://localhost:8080
```

Fonctionnalités :
- Liste et détail des guides
- Liste des sommets
- Création, modification et suppression des randonnées
- Création et consultation des réservations
- Connexion / déconnexion

La configuration JPA utilise `ddl-auto=none` : le schéma n'est jamais modifié par
Spring, il doit être créé au préalable par les migrations Laravel.

## Équipe

_Laurine, Laureline, Christophe._
