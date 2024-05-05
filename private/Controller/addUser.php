<?php

$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/addUser.php";
    return;
}

if (empty($_POST["name"])) {
    $nameErr = "Input user name";
    require_once "../View/addUser.php";
    return;
}
if (empty($_POST["surname"])) {
    printf("Input user surname");
    require_once "../View/addUser.php";
    return;
}
if (empty($_POST["email"])) {
    printf("Input user email");
    require_once "../View/addUser.php";
    return;
}


require_once "../Model/DB.php";
require_once "../Model/User.php";


$db = new DB();

$userName = $_POST["name"];
$userSurname = $_POST["surname"];
$userEmail = $_POST["email"];

$user = new User($userName, $userSurname, $userEmail);
if ($db->insertUser($user)) {
    echo "Successfully added user $userName <br>";
}

printf("<a href='../../index.php'>Go home</a>");