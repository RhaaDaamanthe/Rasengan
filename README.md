# Rasengan

Rasengan est une application Web PHP proposant un petit framework maison. Elle permet de gérer des cartes inspirées d'animes et de films et fournit plusieurs interfaces d'administration.

## Installation rapide
1. **Prérequis** : PHP 8 et MySQL. Installez aussi [Composer](https://getcomposer.org/).
2. **Récupération** :
   ```bash
   git clone <url-du-repo>
   cd RasenganClone
   composer install
   ```
3. **Base de données** :
   - Renseignez vos identifiants dans `src/Database/DBConnexion.php`.
   - Lancez `script/create.sql` puis `script/insert.sql` pour créer et remplir la base.
4. **Serveur de développement** :
   ```bash
   php -S localhost:8000 -t public
   ```
   L'application sera alors disponible sur [http://localhost:8000](http://localhost:8000).

## Routage et points d'entrée
Le routeur défini dans `public/index.php` charge tous les fichiers du dossier `routes/`. Chaque route appelle un contrôleur `__invoke()`.

### Accueil
- `GET /` → `HomeController`

### Authentification
- `GET|POST /inscription` → `InscriptionController`
- `GET|POST /connexion` → `ConnexionController`
- `POST /logout` → `LogoutController`

### Catalogue
- `GET /catalogue` → `CatalogueController`
- `GET /catalogue/anime` → `CatalogueAnimeController`
- `GET /catalogue/anime/mythique` → `CatalogueAnimeMythiqueController`
- `GET /catalogue/anime/mythique/:id` → `CatalogueAnimeMythiqueDetailController`
- `GET /catalogue/film` → `CatalogueFilmController`
- `GET /catalogue/film/mythique` → `CatalogueFilmMythiqueController`
- `GET /catalogue/film/mythique/:id` → `CatalogueFilmMythiqueDetailController`

### Collections
- `GET /collection` → `CollectionController`
- `GET /collection/joueur/:id` → `PlayerController`
- `GET /collection/joueur/:id/anime` → `PlayerAnimeController`
- `GET /collection/joueur/:id/film` → `PlayerFilmController`

### Compte utilisateur
- `GET /compte/:id` → `AccountController`
- `POST /compte/update` → `UpdateAccountController`
- `GET /compte/viewer/:id` → `AccountViewerController`
- `GET /compte/badge` → `ListUserBadgeController`

### Administration
- `GET /admin/anime-cartes` → `ListAnimeCardController`
- `GET /admin/anime-cartes/ajouter` → `CreateAnimeCardFormController`
- `POST /admin/anime-cartes/ajouter` → `CreateAnimeCardSubmitController`
- `GET /admin/anime-cartes/modifier/:id` → `UpdateAnimeCardFormController`
- `POST /admin/anime-cartes/modifier/:id` → `UpdateAnimeCardSubmitController`
- `POST /admin/anime-cartes/supprimer/:id` → `DeleteAnimeCardController`
- `GET /admin/film-cartes` → `ListFilmCardController`
- `GET /admin/film-cartes/ajouter` → `CreateFilmCardFormController`
- `POST /admin/film-cartes/ajouter` → `CreateFilmCardSubmitController`
- `GET /admin/film-cartes/modifier/:id` → `UpdateFilmCardFormController`
- `POST /admin/film-cartes/modifier/:id` → `UpdateFilmCardSubmitController`
- `POST /admin/film-cartes/supprimer/:id` → `DeleteFilmCardController`
- `GET /admin/badge` → `ListBadgeController`
- `POST /admin/badge/creer` → `CreateBadgeController`
- `POST /admin/badge/ajouter` → `AddUserBadgeController`

## Structure du projet
- `public/` : point d'entrée et ressources statiques.
- `routes/` : définitions de toutes les routes.
- `src/` : contrôleurs, modèles et accès base de données.
- `script/` : scripts SQL.