<?php

require_once "shared/header.php";

if (empty($usersComments)) {
    printf("There are no users how write comments.");
} else {
    foreach ($usersComments as $item) {
        printf("<h4>%s — %s <a href='%s'>Update</a> <a href='%s'>Delete</a></h4>", $item["name"], $item["CommentText"], $item['updateComment'], $item['deleteComment']);
    }
}


require_once "shared/footer.php";