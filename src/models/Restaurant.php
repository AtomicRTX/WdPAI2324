<?php

class Restaurant
{
    public function getResLogo(): string
    {
        return $this->res_logo;
    }

    public function setResLogo(string $res_logo): void
    {
        $this->res_logo = $res_logo;
    }
    public function getResId(): int
    {
        return $this->res_id;
    }

    public function setResId(int $res_id): void
    {
        $this->res_id = $res_id;
    }

    public function getResRating(): int
    {
        return $this->res_rating;
    }

    public function setResRating(int $res_rating): void
    {
        $this->res_rating = $res_rating;
    }

    private $res_id;
    private $res_name;
    private $res_location;
    private $res_logo;
    private $res_image;
    private $res_d;
    private $res_rating;

    public function __construct(int $id, string $name, string $location, string $logo, string $image, string $description, int $rating)
    {
        $this->res_id = $id;
        $this->res_name = $name;
        $this->res_location = $location;
        $this->res_logo = $logo;
        $this->res_image = $image;
        $this->res_d = $description;
        $this->res_rating = $rating;
    }

    public function getResName(): string
    {
        return $this->res_name;
    }

    public function setResName($res_name): void
    {
        $this->res_name = $res_name;
    }

    public function getResLocation()
    {
        return $this->res_location;
    }

    public function setResLocation(string $res_location): void
    {
        $this->res_location = $res_location;
    }

    public function getResd()
    {
        return $this->res_d;
    }

    public function setResd(string $res_d): void
    {
        $this->res_d = $res_d;
    }

    public function getResImage()
    {
        return $this->res_image;
    }

    public function setResImage(string $Image): void
    {
        $this->res_image = $Image;
    }

}