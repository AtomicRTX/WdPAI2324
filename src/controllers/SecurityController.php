<?php

session_start();

require_once 'AppController.php';
require_once __DIR__."/../models/User.php";
require_once __DIR__.'/../repository/UserRepository.php';


class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);



        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!!']]);
        }

        if($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email not exist!!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }


        //Sesja uzytkownika
        $_SESSION['logged'] = true;
        $_SESSION['user'] = [
            'id' => $user->getUserId(),
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'phone' => $user->getPhone(),
            'type' => $user->getType()
        ];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home_page");
    }

    public function register()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $phone = $_POST['phoneNumber'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password!']]);
        }
        if($userRepository->getUser($email)){
            return $this->render('register', ['messages' => ['User with this email already exist!']]);
        }
        if(!preg_match('/\S+@\S+\.\S+/', $email)){
            return $this->render('register', ['messages' => ['Please provide proper email!']]);
        }
        if(!preg_match('/^\d{9,15}$/', $phone)){
            return $this->render('register', ['messages' => ['Please provide proper phone number!']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($name, $surname, $email, $hashedPassword, $phone, $type);

        //$user = new User($name, $surname, $email, $password, $phone);

        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}