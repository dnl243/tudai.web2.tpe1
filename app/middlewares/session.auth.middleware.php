<?php

function sessionAuthMiddleware($req) {
  session_start();
  if (isset($_SESSION['id_user'])) {
    $req->user = new stdClass();
    $req->user->id_user = $_SESSION['id_user'];
    $req->user->email = $_SESSION['email'];
    return;
  } else {
    $controller = new MovieController($req);
    $controller->showError("Please, login to continue..");
    die();
  }
};
?>
