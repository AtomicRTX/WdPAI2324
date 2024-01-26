<?php

class User
{
    public function getType() : string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
    private $user_id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $phone;
    private $type;

    public function __construct(string $name, string  $surname, string $email, string  $password, int $phone, int $type)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->type = $type;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function setPhone(int $phone)
    {
        $this->phone = $phone;
    }
}