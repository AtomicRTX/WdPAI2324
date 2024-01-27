<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home_page', 'RestaurantController');
Router::get('profile_page', 'DefaultController');
Router::get('restaurant_page', 'RestaurantController');
Router::get('my_reservation', 'ReservationController');
Router::get('cancel_reservation', 'ReservationController');

Router::get('restaurant_details', 'RestaurantController');
Router::post('restaurant_reservation', 'RestaurantController');
Router::get('categories_page', 'RestaurantController');
Router::get('logout', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('add_restaurant', 'RestaurantController');
Router::post('edit', 'UserController');

Router::run($path);