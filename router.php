<?php

require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/admin.controller.php';
require_once 'libs/request.php';
require_once 'app/middlewares/session.auth.middleware.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$req = new Request();

// acción por defecto
$action = empty($_GET['action']) ? 'home' : $_GET['action'];

// parseo de $action para separar acción de parámetros
$params = explode('/', $action);

// TABLA DE RUTEO
// home         MovieController->showMovies();
// movie/:id    MovieController->showMovie($id);
// genres       MovieController->showGenres();
// genre/:id    MovieController->showMoviesByGenre($id);
// showLogin    AuthController->showLogin();
// login        AuthController->login();
// logout       AdminController->logout();
// showList     AdminController->showList();
// showAdd      AdminController->showAdd();
// add          AdminController->add();
// delete       AdminController->delete();
// showEdit     AdminController->showEdit();
// edit         AdminController->edit();

switch ($params[0]) {
  case 'home':
    $contoller = new MovieController();
    $contoller->showMovies();
    break;
  case 'movie':
    $contoller = new MovieController();
    $contoller->showMovie($params[1]);
    break;
  case 'genres':
    $contoller = new MovieController();
    $contoller->showGenres();
    break;
  case 'genre':
    $contoller = new MovieController();
    $contoller->showMoviesByGenre($params[1]);
    break;
  case 'showLogin':
    $contoller = new AuthController();
    $contoller->showLogin();
    break;
  case 'login':
    $contoller = new AuthController();
    $contoller->login();
    break;
  case 'logout':
    $contoller = new AdminController();
    $contoller->logout();
    break;
  case 'showList':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showList();
    break;
  case 'showAdd':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showAdd();
    break;
  case 'add':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->add();
    break;
  case 'delete':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->delete($params[1]);
    break;
  case 'showEdit':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showEdit($params[1]);
    break;
  case 'edit':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->edit();
    break;
  case 'showGenreList':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showGenreList();
    break;
  case 'showAddGenre':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showAddGenre();
    break;
  case 'addGenre':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->addGenre();
    break;
  case 'deleteGenre':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->deleteGenre($params[1]);
    break;
  case 'showGenreEdit':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->showGenreEdit($params[1]);
    break;
  case 'editGenre':
    sessionAuthMiddleware($req);
    $contoller = new AdminController();
    $contoller->editGenre($params[1]);
    break;
  default:
    $controller = new MovieController();
    $controller->showError("404 Page Not Found");
    break;
}
