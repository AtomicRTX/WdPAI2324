<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('home_page', 'RestaurantController');
Router::get('profile_page', 'DefaultController');
Router::get('restaurant_page', 'RestaurantController');

Router::get('restaurant_details', 'RestaurantController');

Router::get('italian', 'RestaurantController');
Router::get('indian', 'RestaurantController');
Router::get('sushi', 'RestaurantController');
Router::get('mexican', 'RestaurantController');
Router::get('thai', 'RestaurantController');
Router::get('vietnamese', 'RestaurantController');
Router::get('seafood', 'RestaurantController');
Router::get('chinese', 'RestaurantController');
Router::get('burgers', 'RestaurantController');
Router::get('vegetarian', 'RestaurantController');

Router::post('login', 'SecurityController');

Router::run($path);