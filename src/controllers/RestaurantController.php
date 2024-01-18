<?php

require_once 'AppController.php';
require_once __DIR__."/../models/Restaurant.php";
require_once __DIR__.'/../repository/RestaurantRepository.php';

class RestaurantController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];

    private $message = [];
    private $restaurantRepository;

    public function __construct()
    {
        parent::__construct();
        $this->restaurantRepository = new RestaurantRepository();
    }

    public function restaurant_page(){
        $restaurants = $this->restaurantRepository->getRestaurants();
        $this->render('restaurant_page', ['restaurants' => $restaurants]);
    }

    public function home_page(){
        $restaurants = $this->restaurantRepository->getBestRestaurants();
        $this->render('home_page', ['restaurants' => $restaurants]);
    }

    ////////////////////////////////////////////////////////////////////////////

    public function italian(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('italian');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function indian(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('indian');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function sushi(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('sushi');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }
    public function mexican(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('mexican');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }
    public function thai(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('thai');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function vietnamese(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('vietnamese');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function seafood(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('seafood');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function chinese(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('chinese');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function burgers(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('burgers');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }

    public function vegetarian(){
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory('vegetarian');
        $this->render('cat_restaurant_page', ['restaurants' => $restaurants]);
    }
    public function restaurant_details(){
        $restaurantId = $_GET['id'];
        $restaurant = $this->restaurantRepository->getRestaurantByID($restaurantId);
        $this->render('restaurant_details', ['restaurant' => $restaurant]);
    }
    public function restaurant_reservation(){
        $restaurantId = $_GET['id'];
        $restaurant = $this->restaurantRepository->getRestaurantByID($restaurantId);
        $this->render('restaurant_reservation', ['restaurant' => $restaurant]);
    }
}