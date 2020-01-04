<?php
include 'db.php';
$title = $_POST["title"];
$content = $_POST["content"];
$type = $_POST["type"];
$scope = $_POST["scope"];
$writer = $_POST["writer"];
$areaID = intval($_POST["area_id"]);
$fileName = $_POST["file_name"];
move_uploaded_file($_FILES["file"]["tmp_name"], "../../news/images/" . $fileName);
$c->query("INSERT INTO news (title, content, type, scope, writer, land_id, date) VALUES ('" . $title . "', '" . $content . "', '" . $type . "', '" . $scope . "', '" . $writer . "', " . $areaID . ", NOW())");
$newsID = mysqli_insert_id($c);
$c->query("INSERT INTO news_images (news_id, img_path) VALUES (" . $newsID . ", '" . $fileName . "')");