<?php

require_once "../Model/DB.php";
$db = new DB();
$result = $db->getUsers();

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userData = $row;
        $userData['updateUrl'] = getUserUpdateUrl($row);
        $userData['deleteUrl'] = getUserDeleteUrl($row);

        $users[] = $userData;
    }
}

require_once "../View/printUsers.php";

function getUserUpdateUrl($row) : string
{
    return '../Controller/updateUser.php?id='.$row['UserId'];
}

function getUserDeleteUrl($row) : string
{
    return '../Controller/deleteUser.php?id='.$row['UserId'];
}