<?php
include 'db.php';
$id = intval($_POST["id"]);
$password = $_POST["password"];
$c->query("UPDATE admins SET password='" . $password . "' WHERE id=" . $id);