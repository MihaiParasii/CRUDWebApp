<?php

class User
{
    private string $name = "";
    private string $surname = "";
    private string $email = "";

    /**
     * @param string $name
     * @param string $surname
     * @param string $email
     */
    public function __construct(string $name, string $surname, string $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }


    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getSurname() : string
    {
        return $this->surname;
    }

    public function setSurname(string $surname) : void
    {
        $this->surname = $surname;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }


}