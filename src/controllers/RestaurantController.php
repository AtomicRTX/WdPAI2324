<?php

require_once 'AppController.php';
require_once __DIR__."/../models/Restaurant.php";
require_once __DIR__.'/../repository/RestaurantRepository.php';

class RestaurantController extends AppController
{
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

    public function add_restaurant(){
        $restaurantRepository = new RestaurantRepository();

        if (!$this->isPost()) {
            return $this->render('add_restaurant');
        }

        $res_name = $_POST['res_name'];
        $res_location = $_POST['res_location'];
        $res_logo = $_POST['res_logo'];
        $res_image = $_POST['res_image'];
        $res_d = $_POST['res_d'];
        $res_rating = $_POST['res_rating'];

        $restaurant = new Restaurant($res_name, $res_location, $res_logo, $res_image, $res_d, $res_rating);

        $restaurantRepository->addRestaurant($restaurant);

        return $this->render('add_restaurant', ['messages' => ['Restaurant added successfully.']]);
    }

    ////////////////////////////////////////////////////////////////////////////

    public function categories_page(){
        $category = $_GET['cat'];
        $restaurants = $this->restaurantRepository->getRestaurantsByCategory($category);
        $this->render('categories_page', ['restaurants' => $restaurants]);
    }
    public function restaurant_details(){
        $restaurantId = $_GET['id'];
        $restaurant = $this->restaurantRepository->getRestaurantByID($restaurantId);
        $this->render('restaurant_details', ['restaurant' => $restaurant]);
    }
    public function restaurant_reservation(){
        $restaurantId = $_GET['id'];

        $restaurant = $this->restaurantRepository->getRestaurantByID($restaurantId);
        if(!$this->isPost()) {
            $this->render('restaurant_reservation', ['restaurant' => $restaurant, 'messages' => '']);
        }

        $userEmail = $_SESSION['user']['email'];
        $date = new DateTime($_POST["selectedDate"]);
        $np = $_POST['selectedNumberOfPeople'];
        $time = new DateTime($_POST['selectedTime']);
        $dateP = $date->format('Y-m-d');
        $timeP = $time->format('H:i');

        $result = $this->restaurantRepository->reservation($userEmail, $restaurantId, $dateP, $timeP, $np);
        $this->render('restaurant_reservation', ['restaurant' => $restaurant, 'messages' => $result]);
    }

}