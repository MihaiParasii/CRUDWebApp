<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/deleteComment.php";
    return;
}


require_once "../Model/DB.php";
$db = new DB();
$CommentID = $_POST["CommentID"];

if (empty($CommentID)) {
    printf("Input CommentID. <br>");
    require_once "../View/deleteComment.php";
    return;
}

if ($db->deleteComment($CommentID)) {
    printf("Comment deleted successfully. <br>");
} else {
    printf("Wrong CommentID.  <br>");
}

printf("<a href='../../index.php'>Go home</a>");