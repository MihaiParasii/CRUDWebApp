<?php
require_once "../Model/DB.php";
require_once "../Model/User.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DB();
    $user_from_db = $db->getUserById($id);

    if (empty($user_from_db)) {
        printf("User is not found");
        return;
    }

    $row = $user_from_db->fetch_row();
    $user = ['UserId' => $row[0], 'UserName' => $row[1], 'UserSurname' => $row[2], 'UserEmail' => $row[3]];
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/updateUser.php";
    return;
}

$userID = $_POST["UserID"];
$userName = $_POST["UserName"];
$userSurname = $_POST["UserSurname"];
$userEmail = $_POST["UserEmail"];


$db = new DB();
$user = new User($userName, $userSurname, $userEmail);

if ($db->updateUser($userID, $user)) {
    printf("User successfully updated. <br>");
} else {
    printf("User not found. <br>");
}

echo "<a href='../../index.php'>Go Home<a/>";