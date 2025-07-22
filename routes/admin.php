//use




//routes

// ------ Anime -------
// 📝 Afficher la liste des cartes anime
$router->get('/admin/anime-cartes', ListAnimeCardController::class);

// ➕ Formulaire d’ajout d’une carte anime
$router->get('/admin/anime-cartes/ajouter', CreateAnimeCardFormController::class);
// ✔ Traitement du formulaire d’ajout
$router->post('/admin/anime-cartes/ajouter', CreateAnimeCardSubmitController::class);

// ✏️ Formulaire d’édition d’une carte anime
$router->get('/admin/anime-cartes/modifier/:id', UpdateAnimeCardFormController::class);
// ✔ Traitement du formulaire d’édition
$router->post('/admin/anime-cartes/modifier/:id', UpdateAnimeCardSubmitController::class);

// ❌ Suppression d’une carte anime
$router->post('/admin/anime-cartes/supprimer/:id', DeleteAnimeCardController::class);

// ------ Film -------

// 📝 Afficher la liste des cartes film
$router->get('/admin/film-cartes', ListFilmCardController::class);

// ➕ Formulaire d’ajout d’une carte film
$router->get('/admin/film-cartes/ajouter', CreateFilmCardFormController::class);
// ✔ Traitement du formulaire d’ajout
$router->post('/admin/film-cartes/ajouter', CreateFilmCardSubmitController::class);

// ✏️ Formulaire d’édition d’une carte film
$router->get('/admin/film-cartes/modifier/:id', UpdateFilmCardFormController::class);
// ✔ Traitement du formulaire d’édition
$router->post('/admin/film-cartes/modifier/:id', UpdateFilmCardSubmitController::class);

// ❌ Suppression d’une carte film
$router->post('/admin/film-cartes/supprimer/:id', DeleteFilmCardController::class);
