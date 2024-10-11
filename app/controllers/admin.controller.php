<?php

require_once 'app/views/admin.view.php';

class AdminController
{
  private $model;
  private $view;

  public function __construct()
  {
    $this->model = new MovieModel();
    $this->view = new AdminView();
  }

  // desloguearse
  public function logout()
  {
    session_start();
    session_destroy();
    header('Location: ' . BASE_URL);
  }

  // panel con lista de películas
  public function showList()
  {
    $movies = $this->model->getMovies();

    if ($movies) {
      $this->view->showList($movies);
    } else {
      $this->view->showError("movies not found");
    }
  }

  // formulario para insertar una película
  public function showAdd()
  {
    $genres = $this->model->getGenres();

    $this->view->showAdd($genres);
  }

  // insertar una película
  public function add()
  {
    if (!isset($_POST['id_movie']) || empty($_POST['id_movie'])) {
      return $this->view->showError("'id_movie' field must be complete");
    }
    if (!isset($_POST['title']) || empty($_POST['title'])) {
      return $this->view->showError("'title' field must be complete");
    }
    if (!isset($_POST['poster_path']) || empty($_POST['poster_path'])) {
      return $this->view->showError("'poster_path' field must be complete");
    }
    if (!isset($_POST['release_date']) || empty($_POST['release_date'])) {
      return $this->view->showError("'release_date' field must be complete");
    }
    if (!isset($_POST['overview']) || empty($_POST['overview'])) {
      return $this->view->showError("'overview' field must be complete");
    }
    if (!isset($_POST['company']) || empty($_POST['company'])) {
      return $this->view->showError("'company' field must be complete");
    }
    if (!isset($_POST['id_genre']) || empty($_POST['id_genre'])) {
      return $this->view->showError("'id_genre' field must be complete");
    }


    $id_movie = $_POST['id_movie'];
    $title = $_POST['title'];
    $poster_path = $_POST['poster_path'];
    $release_date = $_POST['release_date'];
    $overview = $_POST['overview'];
    $company = $_POST['company'];
    $id_genre = $_POST['id_genre'];

    $movie = $this->model->getMovieByTitle($title);

    if (!$movie) {
      $id = $this->model->add($id_movie, $title, $poster_path, $release_date, $overview, $company, $id_genre);
    } else {
      $this->view->showError('this movie already exists in your database');
    }

    // redirijo al panel admin
    header('Location: ' . BASE_URL . 'showList');
  }

  // eliminar una película
  public function delete($title)
  {
    $movie = $this->model->getMovieByTitle($title);

    if ($movie) {
      $this->model->delete($title);
    } else {
      $this->view->showError('the movie you want to delete does not exist');
    }

    // redirijo al panel admin
    header('Location: ' . BASE_URL . 'showList');
  }

  // formulario para editar película
  public function showEdit($title)
  {
    $genres = $this->model->getGenres();
    $movie = $this->model->getMovieByTitle($title);

    if ($movie) {
      $this->view->showEdit($genres, $movie);
    } else {
      $this->view->showError('this movie already exists in your database');
    }

    // redirijo al panel admin
    header('Location: ' . BASE_URL . 'showList');
  }

  // editar una película
  public function edit()
  {

    if (!isset($_POST['id_movie']) || empty($_POST['id_movie'])) {
      return $this->view->showError("'id_movie' field must be complete");
    }
    if (!isset($_POST['title']) || empty($_POST['title'])) {
      return $this->view->showError("'title' field must be complete");
    }
    if (!isset($_POST['poster_path']) || empty($_POST['poster_path'])) {
      return $this->view->showError("'poster_path' field must be complete");
    }
    if (!isset($_POST['release_date']) || empty($_POST['release_date'])) {
      return $this->view->showError("'release_date' field must be complete");
    }
    if (!isset($_POST['overview']) || empty($_POST['overview'])) {
      return $this->view->showError("'overview' field must be complete");
    }
    if (!isset($_POST['company']) || empty($_POST['company'])) {
      return $this->view->showError("'company' field must be complete");
    }
    if (!isset($_POST['id_genre']) || empty($_POST['id_genre'])) {
      return $this->view->showError("'id_genre' field must be complete");
    }

    $id_movie = $_POST['id_movie'];
    $title = $_POST['title'];
    $poster_path = $_POST['poster_path'];
    $release_date = $_POST['release_date'];
    $overview = $_POST['overview'];
    $company = $_POST['company'];
    $id_genre = $_POST['id_genre'];

    $movie = $this->model->getMovieById($id_movie);

    if ($movie) {
      $id = $this->model->edit($id_movie, $title, $poster_path, $release_date, $overview, $company, $id_genre);
    } else {
      $this->view->showError('the movie you want to modify does not exist');
    }

    // redirijo al panel admin
    header('Location: ' . BASE_URL . 'showList');
  }
}
