<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Restaurant.php';
require_once __DIR__.'/../models/Reservation.php';

class ReservationRepository extends Repository
{
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Zwrócenie rezerwacji danego uzytkownika z bazy danych

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getReservations(string $userEmail): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT
            r."user_id",
            r."res_id",
            res."res_name",
            res."res_logo",
            r."date",
            r."hour",
            r."number_people"
        FROM
            "public"."reservation" r
        JOIN
            "public"."restaurants" res ON r."res_id" = res."res_id"
        JOIN
            "public"."users" u ON r."user_id" = u."user_id"
        WHERE
            u."email" = :email AND r."date" >= CURRENT_DATE
ORDER BY
    r."date" ASC, r."hour" ASC;
        ');

        $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);

        $stmt->execute();

        $reservations = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($reservations as $reservation){
            $hour = DateTime::createFromFormat('H:i:s', $reservation['hour']);
            $date = DateTime::createFromFormat('Y-m-d', $reservation['date']);
            $result[] = new Reservation(
                $reservation['user_id'],
                $reservation['res_id'],
                $reservation['res_name'],
                $reservation['res_logo'],
                $date,
                $hour,
                $reservation['number_people'],
            );
        }
        return $result;
    }

    public function deleteReservation(int $user_id, int $res_id, DateTime $date, DateTime $hour, int $numberPeople): void
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.reservation
            WHERE user_id = ?
              AND res_id = ?
              AND date = ?
              AND hour = ?
              AND number_people = ?;
        ');

        $stmt->execute([
            $user_id,
            $res_id,
            $date,
            $hour,
            $numberPeople
        ]);
    }
}