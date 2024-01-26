<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Zwrócenie użytkownika z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getUser(string $email): ?User {

        $stmt = $this->database->connect()->prepare('
            SELECT
                u.user_id,
                u.email,
                u.password,
                ud.name,
                ud.surname,
                ud.phone,
                ut.type_id
            FROM
                public.users u
            JOIN
                public.user_detail ud ON u.detail_id = ud.detail_id
            LEFT JOIN
                public.user_types ut ON u.user_id = ut.user_id
            WHERE
                u.email =:email
        ');


        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            $user['phone'],
            $user['type_id']
        );
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Dodanie użytkownika do bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function addUser(User $user)
    {
            $pdo = $this->database->connect();

            $stmtUserDetail = $pdo->prepare('
            INSERT INTO public.user_detail (name, surname, phone)
            VALUES (?, ?, ?)
        ');

            $stmtUserDetail->execute([
                $user->getName(),
                $user->getSurname(),
                $user->getPhone(),
            ]);

            $detailId = $pdo->lastInsertId();

            $stmtUsers = $pdo->prepare('
            INSERT INTO public.users (detail_id, email, password)
            VALUES (?, ?, ?)
        ');

            $stmtUsers->execute([
                $detailId,
                $user->getEmail(),
                $user->getPassword(),
            ]);

            $stmtUserTypes = $pdo->prepare('
            INSERT INTO public.user_types (user_id, type_id)
            VALUES (?, ?)
        ');

            $stmtUserTypes->execute([
                $pdo->lastInsertId(),
                1,
            ]);

        }

}
