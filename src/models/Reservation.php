<?php

class Reservation
{
    private $user_id;
    private $res_id;
    private $res_name;
    private $res_logo;
    private $date;
    private $hour;
    private $numberPeople;
    public function __construct(int $user_id, int $res_id, string $res_name, string $res_logo, DateTime $date, DateTime $hour, int $numberPeople)
    {
        $this->user_id = $user_id;
        $this->res_id = $res_id;
        $this->res_name = $res_name;
        $this->res_logo = $res_logo;
        $this->date = $date;
        $this->hour = $hour;
        $this->numberPeople = $numberPeople;
    }
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getResId(): int
    {
        return $this->res_id;
    }

    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    public function getResName(): string
    {
        return $this->res_name;
    }

    public function setResName(string $res_name): void
    {
        $this->res_name = $res_name;
    }

    public function getResLogo(): string
    {
        return $this->res_logo;
    }

    public function setResLogo(string $res_logo): void
    {
        $this->res_logo = $res_logo;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getHour(): DateTime
    {
        return $this->hour;
    }

    public function setHour(DateTime $hour): void
    {
        $this->hour = $hour;
    }

    public function getNumberPeople(): int
    {
        return $this->numberPeople;
    }

    public function setNumberPeople(int $numberPeople): void
    {
        $this->numberPeople = $numberPeople;
    }


}