<?php

include_once("shared/header.php");

if (empty($users)) {
    printf("There are no users");
} else {
    foreach ($users as $user) {
        printf("<h3>%s %s %s <a href='%s'>Update</a> <a href='%s'>Delete</a></h3>", $user["name"], $user["surname"], $user["email"], $user['updateUrl'], $user['deleteUrl']);
    }
}


include_once("shared/footer.php");
