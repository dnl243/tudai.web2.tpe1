<?php

function sessionAuthMiddleware($res) {
  session_start();
  if (isset($_SESSION['id_user'])) {
    $res->user = new stdClass();
    $res->user->id_user = $_SESSION['id_user'];
    $res->user->email = $_SESSION['email'];
    return;
  } else {
    $controller = new MovieController($res);
    $controller->showError("Please, login to continue..");
    die();
  }
};
?>
