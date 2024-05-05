<?php

require_once "shared/header.php"; ?>

    <form action="../Controller/updateUser.php" method="post">
        <label>
            <input type="number" name="UserID" placeholder="UserID" hidden="hidden"
                   value="<?= $user['UserId'] ?? null ?>">
        </label><br>
        <label>
            <input type="text" name="UserName" placeholder="User Name" value="<?= $user['UserName'] ?? null ?>">
        </label><br>
        <label>
            <input type="text" name="UserSurname" placeholder="User Surname"
                   value="<?= $user['UserSurname'] ?? null ?>">
        </label><br>
        <label>
            <input type="text" name="UserEmail" placeholder="User Email" value="<?= $user['UserEmail'] ?? null ?>">
        </label><br>
        <button type="submit">Update User</button>
    </form>

<?php
require_once "shared/footer.php"; ?>