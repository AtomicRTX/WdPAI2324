<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Restaurant.php';

class RestaurantRepository extends Repository
{

    public function getRestaurants(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.restaurants;
        ');
        $stmt->execute();

        $restaurants = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($restaurants as $restaurant){
            $result[] = new Restaurant(
                $restaurant['res_id'],
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_url'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
            );
        }
        return $result;
    }

    public function getBestRestaurants(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.restaurants
            ORDER BY res_rating DESC
            LIMIT 3;
        ');
        $stmt->execute();

        $restaurants = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($restaurants as $restaurant){
            $result[] = new Restaurant(
                $restaurant['res_id'],
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_url'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
            );
        }

        return $result;
    }

    public function getRestaurantsByCategory(string $category): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * 
            FROM restaurants 
            RIGHT JOIN restaurants_categories ON restaurants.res_id = restaurants_categories.res_id
            RIGHT JOIN categories ON restaurants_categories.cat_id = categories.category_id
            WHERE categories.category_name = :category;
        ');

        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        $restaurants = $stmt->fetchALL(PDO::FETCH_ASSOC);

        foreach ($restaurants as $restaurant){
            $result[] = new Restaurant(
                $restaurant['res_id'],
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_url'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
            );
        }

        return $result;
    }

    public function getRestaurantByID(int $restaurantID): ?Restaurant
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.restaurants
            WHERE res_id = :restaurantID
        ');
        $stmt->bindParam(':restaurantID', $restaurantID, PDO::PARAM_STR);
        $stmt->execute();

        $restaurants = $stmt->fetch(PDO::FETCH_ASSOC);
        $restaurant= new Restaurant(
                $restaurants['res_id'],
                $restaurants['res_name'],
                $restaurants['res_location'],
                $restaurants['res_url'],
                $restaurants['res_d'],
                $restaurants['res_rating'],
            );
        return $restaurant;
    }
}