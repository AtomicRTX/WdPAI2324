<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function welcome(){
        $this->render('welcome');
    }

    public function register(){
        $this->render('register');
    }
    public function login(){
        $this->render('login');
    }
    public function profile_page(){
        $this->render('profile_page');
    }
}