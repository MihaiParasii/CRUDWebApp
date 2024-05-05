<?php

require_once "../Model/DB.php";
$db = new DB();
$result = $db->getComments();

$comments = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}
require_once "../View/printComments.php";
