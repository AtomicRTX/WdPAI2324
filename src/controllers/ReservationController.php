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

    public function cancel_reservation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['reservationId'])) {

                $reservationRepository->deleteReservation(
                    $reservation->getUserId(),
                    $reservation->getResId(),
                    $reservation->getDate(),
                    $reservation->getHour(),
                    $reservation->getNumberPeople()
                );


            }
        }
    }
}