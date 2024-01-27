<?php

require_once 'AppController.php';
require_once __DIR__."/../models/User.php";
require_once __DIR__.'/../repository/UserRepository.php';


class UserController extends AppController
{
    public function edit(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('edit');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNumber'];

        $user = $userRepository->getUser($email);
        $userEmail = $user->getEmail();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPhone($phone);
        $user->setEmail($email);

        $userRepository->updateUser($userEmail, $user);

        $updatedUser = $userRepository->getUser($email);
        $_SESSION['user'] = [
            'id' => $updatedUser->getUserId(),
            'email' => $updatedUser->getEmail(),
            'name' => $updatedUser->getName(),
            'surname' => $updatedUser->getSurname(),
            'phone' => $updatedUser->getPhone(),
            'type' => $updatedUser->getType()
        ];
        return $this->render('profile_page');

    }
}