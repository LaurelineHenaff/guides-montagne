# La Compagnie des Guides — Front-office

Front-office de [La Compagnie des Guides](../README.md), développé avec **Spring Boot 3.0.4**
(Java 19), Spring Data JPA et des vues JSP. Il est packagé en WAR.

## Prérequis

- JDK 19 (le wrapper Maven `mvnw` est fourni)
- MySQL ou MariaDB, avec la base `guidesmontagne` **déjà créée et remplie** par les
  migrations du [back-office](../back-office) (la configuration JPA est en `ddl-auto=none` :
  Spring ne modifie jamais le schéma)

## Configuration

Éditer `src/main/resources/application.properties` :

- `spring.datasource.url` (par défaut `jdbc:mysql://localhost:3306/guidesmontagne`)
- `spring.datasource.username` / `spring.datasource.password`

Pour utiliser MariaDB, des lignes commentées (driver JDBC et dialecte Hibernate) sont
disponibles dans ce même fichier.

## Lancement

```
./mvnw spring-boot:run      # http://localhost:8080
```

Pour générer le WAR :

```
./mvnw clean package
```

## Fonctionnalités

| Page | Route |
|---|---|
| Accueil | `/` |
| Connexion / déconnexion | `/login`, `/logout` |
| Guides (liste, détail) | `/guides`, `/guides/{guideId}` |
| Sommets | `/sommets` |
| Randonnées (liste, détail, création, modification, suppression) | `/randonnees`, `/randonnees/create`, `/randonnees/{randonneeId}`, `/randonnees/delete/{randonneeId}` |
| Réservations (liste, détail, création) | `/reservations`, `/reservations/create`, `/reservations/{randonneeId}/{dateReserver}` |

## Structure

```
src/main/java/fr/guidesmvc/frontoffice/
├── abris/  authentification/  concerner/  guides/
├── randonnees/  reserver/  sommets/  vallees/   # modèle, repository, contrôleur
src/main/resources/application.properties
src/main/webapp/WEB-INF/jsp/                      # vues JSP
```

_Laurine, Laureline, Christophe._
