<?php

require_once "../Model/DB.php";

$db = new DB();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userID = $_GET["id"];
} else {
    require_once "../View/userNotFound.php";
    return;
}

$db->deleteUsersComments($userID);

if ($db->deleteUser($userID)) {
    printf("User successfully deleted.<br>");
} else {
    printf("User does not exists.<br>");
}

echo "<a href='../../index.php'>Go Home<a/>";