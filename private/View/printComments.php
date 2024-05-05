<?php

require_once "shared/header.php";

if (empty($comments)) {
    printf("<h3>There are no comments</h3>");
} else {
    foreach ($comments as $comment) {
        printf("<h3>%d %d %s<h3>", $comment["CommentId"], $comment["UserId"], $comment["CommentText"]);
    }
}


require_once "shared/footer.php";