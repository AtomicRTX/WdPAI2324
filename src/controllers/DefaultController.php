<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function welcome(){
        $this->render('welcome');
    }
    public function profile_page(){
        $this->render('profile_page');
    }

    public function logout(){
        session_unset();
        header('Location: login');
    }
}