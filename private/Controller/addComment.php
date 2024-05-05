<?php

require_once "../Model/DB.php";
require_once "../Model/Comment.php";

$db = new DB();

$result = $db->getUsers();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/addComment.php";
    return;
}

$userID = $_POST["user"];
$comment = $_POST["comment"];


if (!$db->existsUserID($userID)) {
    printf("<h2>This user does not exists.</h2>");
    printf("<a href='../../index.php'>Go home</a>");
    return;
}

$comment = new Comment($userID, $comment);

if ($db->insertComment($comment)) {
    require_once "../View/commentAddedSuccessfully.php";
    return;
} else {
    printf("Something go wrong <br>");
}

