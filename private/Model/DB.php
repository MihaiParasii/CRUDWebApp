<?php

class DB
{
    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "root";
    private string $dbname = "bimbam";
    private string $userTable = "users";
    private string $commentTable = "commentaries";
    private string $query = "";

    private mysqli $conn;


    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("You died" . $this->conn->connect_error);
        }
    }


    public function __destruct()
    {
        $this->conn->close();
    }


    public function insertUser(User $user) : bool|mysqli_result
    {
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $this->query = "INSERT INTO $this->dbname.$this->userTable (name, surname, email) VALUES 
                                            ('$name', '$surname', '$email')";

        return $this->conn->query($this->query);
    }

    public function getUsers() : mysqli_result|bool
    {
        $this->query = "SELECT * FROM $this->dbname.$this->userTable";
        return $this->conn->query($this->query);
    }

    public function getUserById(int $id) : mysqli_result|bool
    {
        $this->query = "SELECT * FROM $this->dbname.$this->userTable WHERE UserId = $id";
        return $this->conn->query($this->query);
    }

    public function deleteUser(int $id) : bool|mysqli_result
    {
        $this->query = "DELETE FROM $this->dbname.$this->userTable WHERE UserId = $id";
        return $this->conn->query($this->query);
    }

    public function deleteUsersComments(int $userID) : void
    {
        $this->query = "DELETE FROM $this->dbname.$this->commentTable WHERE UserID = $userID";
        $this->conn->query($this->query);
    }

    public function updateUser(int $id, User $user) : bool|mysqli_result
    {
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();

        $this->query = "UPDATE $this->dbname.$this->userTable SET name = '$name', surname = '$surname', email = '$email' 
                                            WHERE UserId = $id";

        return $this->conn->query($this->query);
    }

    public function insertComment(Comment $comment) : bool|mysqli_result
    {
        $userId = $comment->getUserID();
        $commentText = $comment->getComment();
        $this->query = "INSERT INTO $this->dbname.$this->commentTable(userID, CommentText) VALUES 
                                                 ($userId, '$commentText')";

        return $this->conn->query($this->query);
    }

    public function deleteComment(int $id) : bool|mysqli_result
    {
        $this->query = "DELETE FROM $this->dbname.$this->commentTable WHERE Commentid = $id";
        return $this->conn->query($this->query);
    }

    public function updateComment(int $id, Comment $comment) : bool|mysqli_result
    {
        $commentText = $comment->getComment();

        $this->query = "UPDATE $this->dbname.$this->commentTable 
            SET CommentText = '$commentText' WHERE CommentID = $id";

        return $this->conn->query($this->query);
    }

    public function getComments() : mysqli_result|bool
    {
        $this->query = "SELECT * FROM $this->dbname.$this->commentTable";
        return $this->conn->query($this->query);
    }

    public function getCommentById(int $id) : mysqli_result|bool
    {
        $this->query = "SELECT * FROM $this->dbname.$this->commentTable WHERE CommentID = $id";
        return $this->conn->query($this->query);
    }

    public function getUsersComments() : bool|mysqli_result
    {
        $this->query = "SELECT u.name, c.CommentText FROM $this->dbname.$this->userTable AS u INNER JOIN $this->dbname.$this->commentTable AS c ON u.UserId = c.UserID";
        return $this->conn->query($this->query);
    }


    public function existsUserID(int $userID) : bool
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            if ($user["UserId"] == $userID) {
                return true;
            }
        }
        return false;
    }

}