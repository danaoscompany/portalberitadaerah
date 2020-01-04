<?php
include 'db.php';
$results = $c->query("SELECT * FROM news ORDER BY date");
$news = [];
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $type = $row["type"];
        $images = NULL;
        if ($type == "news") {
            $images = $c->query("SELECT * FROM news_images WHERE news_id=" . $row["id"] . " ORDER BY id DESC LIMIT 1");
        } else if ($type == "article") {
            $images = $c->query("SELECT * FROM article_images WHERE news_id=" . $row["id"] . " ORDER BY id DESC LIMIT 1");
        }
        if ($images && $images->num_rows > 0) {
            $image = $images->fetch_assoc();
            $row["img_path"] = $image["img_path"];
        }
        $tagsJSON = [];
        $tags = $c->query("SELECT * FROM news_tags WHERE news_id=" . $row["id"]);
        if ($tags && $tags->num_rows > 0) {
            while ($tag = $tags->fetch_assoc()) {
                $tagNames = $c->query("SELECT * FROM tags WHERE id=" . $tag["tag_id"]);
                if ($tagNames && $tagNames->num_rows > 0) {
                     $tag["name"] = $tagNames->fetch_assoc()["tag"];
                }
                array_push($tagsJSON, $tag);
            }
        }
        $row["tags"] = json_encode($tagsJSON);
        array_push($news, $row);
    }
}
echo json_encode($news);