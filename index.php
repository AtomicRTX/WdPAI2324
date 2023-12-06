<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('login', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('welcome', 'DefaultController');

Router::run($path);