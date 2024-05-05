<?php

require_once "shared/header.php"; ?>

    <form action="../Controller/addUser.php" method="post">
        <input type="text" name="name" placeholder="name" required><br>
        <input type="text" name="surname" placeholder="surname" required><br>
        <input type="text" name="email" placeholder="email" required><br>
        <button type="submit">Add</button>
    </form>

<?php
require_once "shared/footer.php"; ?>