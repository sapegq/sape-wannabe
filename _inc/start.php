<?php
include "_inc/dir.php";

// Start session
session_start();

// Get User DB (UDB)
$udb = new PDO('sqlite:db/users.db');
$udb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$udb->exec(
  "CREATE TABLE IF NOT EXISTS users (
    username TEXT NOT NULL PRIMARY KEY UNIQUE, 
    name TEXT, 
    bio TEXT, 
    signup TEXT NOT NULL,
    last_login TEXT,
    password TEXT NOT NULL,
    banned INTEGER NOT NULL
  )"
);

// Get logged status and user information
if (isset($_SESSION["you"])) {
  $f = false;
  foreach ($udb->query("SELECT * FROM users") as $user) {
    if ($_SESSION["you"] == $user) {
      $f = true;
      $you = $user;
    }
  }
  if (!$f) {
    $you = false;
  }
  $f = null;
} else {
  $you = false;
}