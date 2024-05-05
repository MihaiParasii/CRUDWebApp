<?php
require_once "shared/header.php"; ?>

<form action="../Controller/updateComment.php" method="post">
    <label>
        <input type="number" name="CommentID" placeholder="Comment ID" hidden="hidden">
    </label><br>
    <label>
        <input type="number" name="UserID" placeholder="New User ID" hidden="hidden">
    </label><br>
    <label>
        <input type="text" name="CommentText" placeholder="New Comment Text">
    </label><br>
    <button type="submit">Update Comment</button>
</form>

<?php
require_once "shared/footer.php"; ?>
