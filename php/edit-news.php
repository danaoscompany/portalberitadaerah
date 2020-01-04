<?php
include 'db.php';
$id = intval($_POST["id"]);
$title = $_POST["title"];
$content = $_POST["content"];
$type = $_POST["type"];
$scope = $_POST["scope"];
$writer = $_POST["writer"];
$areaID = intval($_POST["area_id"]);
$imageChanged = intval($_POST["image_changed"]);
$c->query("UPDATE news SET title='" . $title . "', content='" . $content . "', type='" . $type . "', scope='" . $scope . "', writer='" . $writer . "', land_id=" . $areaID . " WHERE id=" . $id);
if ($imageChanged == 1) {
    $fileName = $_POST["file_name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../news/images/" . $fileName);
    $c->query("INSERT INTO news_images (news_id, img_path) VALUES (" . $id . ", 'images/" . $fileName . "')");
}