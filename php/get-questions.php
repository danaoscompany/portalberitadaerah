<?php
include 'db.php';
$results = $c->query("SELECT * FROM questions");
$questions = [];
if ($results && $results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        array_push($questions, $row);
    }
}
echo json_encode($questions);