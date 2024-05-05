<?php

require_once "shared/header.php";
/** @var User[] $users */
?>

    <form action="../Controller/addComment.php" method="post">
        <label for="subject">User: </label>
        <select name="user" id="subject" required>
            <option value="" selected disabled hidden>Choose here</option>
            <?php
            foreach ($users as $user) { ?>
                <option value="<?= $user['UserId'] ?>"><?=
                    $user['name']." ".$user['surname']; ?></option>
                <?php
            } ?>

        </select>
        <br>
        <label>
            <input type="text" name="comment" placeholder="Comment" required >
        </label><br>
        <button type="submit">Add Comment</button>
        <br>
    </form>

<?php
require_once "shared/footer.php"; ?>