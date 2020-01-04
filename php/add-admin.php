<?php
include 'db.php';
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("INSERT INTO admins (email, password) VALUES ('" . $email . "', '" . $password . "')");