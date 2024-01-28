<?php

require_once 'AppController.php';
require_once __DIR__."/../models/Reservation.php";
require_once __DIR__.'/../repository/ReservationRepository.php';

class ReservationController extends AppController
{
    private $reservationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->reservationRepository = new ReservationRepository();
    }

    public function my_reservation(){

        $userEmail = $_SESSION['user']['email'];

        $reservations = $this->reservationRepository->getReservations($userEmail);
        $this->render('my_reservation', ['reservations' => $reservations]);
    }

    public function search_rv()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->reservationRepository->getReservationByName($decoded['search_rv']));
        }
    }
    public function cancel_reservation()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userId = $decoded['userId'];
            $resId = $decoded['resId'];
            $date = new DateTime($decoded['date']);
            $hour = new DateTime($decoded['hour']);
            $numberPeople = $decoded['numberPeople'];
            $dateP = $date->format('Y-m-d');
            $hourP = $hour->format('H:i');

            $result = $this->reservationRepository->deleteReservation($userId, $resId, $dateP, $hourP, $numberPeople);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($result);
        }
    }
}