<?php
  require_once('bootstrap/bootstrap.php');
  session_destroy();
  header('location: index.php');
  exit;