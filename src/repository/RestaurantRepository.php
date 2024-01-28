<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Restaurant.php';

class RestaurantRepository extends Repository
{
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Zwrócenie restauracji z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getRestaurants(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT 
                r.*,
                wh.start_hour,
                wh.end_hour
            FROM 
                public.restaurants r
            JOIN 
                public.work_hours wh ON r.res_id = wh.res_id;
        ');
        $stmt->execute();

        $restaurants = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($restaurants as $restaurant){
            $startHour = DateTime::createFromFormat('H:i:s', $restaurant['start_hour']);
            $endHour = DateTime::createFromFormat('H:i:s', $restaurant['end_hour']);
            $result[] = new Restaurant(
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_logo'],
                $restaurant['res_image'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
                $restaurant['res_id'],
                $startHour,
                $endHour
            );
        }
        return $result;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Zwrócenie 3 najlepszych restauracji z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_logo'],
                $restaurant['res_image'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
                $restaurant['res_id']
            );
        }

        return $result;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Zwrócenie restauracji zgodnych z wybraną kategorię z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
                $restaurant['res_name'],
                $restaurant['res_location'],
                $restaurant['res_logo'],
                $restaurant['res_image'],
                $restaurant['res_d'],
                $restaurant['res_rating'],
                $restaurant['res_id']
            );
        }

        return $result;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Zwrócenie restauracji o podanym ID z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function getRestaurantByID(int $restaurantID): ?Restaurant
    {
        $stmt = $this->database->connect()->prepare('
            SELECT 
                r.*,
                wh.start_hour,
                wh.end_hour
            FROM 
                public.restaurants r
            LEFT JOIN 
                public.work_hours wh ON r.res_id = wh.res_id
            WHERE 
                r.res_id = :restaurantID;
        ');
        $stmt->bindParam(':restaurantID', $restaurantID, PDO::PARAM_STR);
        $stmt->execute();

        $restaurants = $stmt->fetch(PDO::FETCH_ASSOC);
        $startHour = DateTime::createFromFormat('H:i:s', $restaurants['start_hour']);
        $endHour = DateTime::createFromFormat('H:i:s', $restaurants['end_hour']);
        $restaurant= new Restaurant(
            $restaurants['res_name'],
            $restaurants['res_location'],
            $restaurants['res_logo'],
            $restaurants['res_image'],
            $restaurants['res_d'],
            $restaurants['res_rating'],
            $restaurants['res_id'],
            $startHour,
            $endHour
            );
        return $restaurant;
    }

    public function getRestaurantByName(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT 
                r.*,
                wh.start_hour,
                wh.end_hour
            FROM 
                public.restaurants r
            LEFT JOIN 
                public.work_hours wh ON r.res_id = wh.res_id
            WHERE 
                LOWER(r.res_name) LIKE :search;
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Dodanie restauracji do bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function addRestaurant(Restaurant $restaurant)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO restaurants (res_name, res_location, res_logo, res_image, res_d, res_rating)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $restaurant->getResName(),
            $restaurant->getResLocation(),
            $restaurant->getResLogo(),
            $restaurant->getResImage(),
            $restaurant->getResd(),
            $restaurant->getResRating()
        ]);
    }

    public function reservation(string $userEmail, int $restaurantID, string $date, string $time, string $np)
    {
        $pdo = $this->database->connect();

        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare('SELECT make_reservation_by_email(?, ?, ?, ?, ?)');
            $stmt->execute([$userEmail, $restaurantID, $date, $time, $np]);

            $result = $stmt->fetchColumn();

            $pdo->commit();

            return $result;
        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            throw $e;
        }
    }
}