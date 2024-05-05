<?php

class Comment
{
    private int $userID = 0;
    private string $comment = "";

    /**
     * @param int $userID
     * @param string $comment
     */
    public function __construct(int $userID, string $comment)
    {
        $this->userID = $userID;
        $this->comment = $comment;
    }

    public function getUserID() : int
    {
        return $this->userID;
    }

    public function setUserID(int $userID) : void
    {
        $this->userID = $userID;
    }

    public function getComment() : string
    {
        return $this->comment;
    }

    public function setComment(string $comment) : void
    {
        $this->comment = $comment;
    }


}