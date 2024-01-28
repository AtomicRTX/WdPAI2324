<?php

class Restaurant
{
    public function getResId(): ?int
    {
        return $this->res_id;
    }

    public function setResId(?int $res_id): void
    {
        $this->res_id = $res_id;
    }

    public function getResStart(): DateTime
    {
        return $this->res_start;
    }

    public function setResStart(DateTime $res_start): void
    {
        $this->res_start = $res_start;
    }

    public function getResEnd(): DateTime
    {
        return $this->res_end;
    }

    public function setResEnd(DateTime $res_end): void
    {
        $this->res_end = $res_end;
    }
    private $res_id;
    private $res_name;
    private $res_location;
    private $res_logo;
    private $res_image;
    private $res_d;
    private $res_start;
    private $res_end;
    private $res_like;


    public function __construct(string $name, string $location, string $logo, string $image, string $description, int $rating = 0, int $id = null, DateTime $res_start=null, DateTime $res_end=null)
    {
        $this->res_id = $id;
        $this->res_name = $name;
        $this->res_location = $location;
        $this->res_logo = $logo;
        $this->res_image = $image;
        $this->res_d = $description;
        $this->res_start = $res_start ?? new DateTime('14:00:00');
        $this->res_end = $res_end ?? new DateTime('22:00:00');
        $this->res_like = $rating;
    }


    public function getResName(): string
    {
        return $this->res_name;
    }

    public function getResLocation(): string
    {
        return $this->res_location;
    }

    public function getResd(): string
    {
        return $this->res_d;
    }
    public function getResImage(): string
    {
        return $this->res_image;
    }
    public function getResLogo(): string
    {
        return $this->res_logo;
    }

    public function getResLike(): int
    {
        return $this->res_like;
    }
}