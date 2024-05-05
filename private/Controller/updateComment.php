<?php

require_once "../Model/DB.php";
require_once "../Model/Comment.php";

if (isset($_GET['CommentId']) && is_numeric($_GET['CommentId'])) {
    $CommentId = $_GET['CommentId'];
    $db = new DB();
    $comment_from_db = $db->getCommentById($CommentId);

    if (empty($comment_from_db)) {
        printf("Comment is not found");
        return;
    }

    $row = $comment_from_db->fetch_row();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/updateComment.php";
    return;
}

$userID = $_POST["UserID"];
$commentID = $_POST["CommentID"];
$commentText = $_POST["CommentText"];


$db = new DB();

if (!$db->existsUserID($userID)) {
    echo "This userID does not exists";
    printf("<a href='../../index.php'>Go home</a>");
    return;
}

$comment = new Comment($userID, $commentText);

if ($db->updateComment($commentID, $comment)) {
    printf("Comment successfully updated.<br>");
} else {
    printf("Comment is not found.<br>");
}
printf("<a href='../../index.php'>Go home</a>");
