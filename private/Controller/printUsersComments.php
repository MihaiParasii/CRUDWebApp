<?php

require_once "../Model/DB.php";

$db = new DB();

$usersComments = $db->getUsersComments();

$result = [];

if ($usersComments->num_rows > 0) {
    while ($row = $usersComments->fetch_assoc()) {
        $commentData[] = $row;
        $commentData['deleteComment'] = getCommentUpdateUrl($row);
        $commentData['updateComment'] = getCommentUpdateUrl($row);

        $result[] = $commentData;
    }
}

require_once "../View/printUsersComments.php";

function getCommentUpdateUrl($row) : string
{
    return '../Controller/updateComment.php?id='.$row['CommentID'];
}

function getCommentDeleteUrl($row) : string
{
    return '../Controller/deleteComment.php?id='.$row['CommentID'];
}