<?php

if (!isset($_SESSION['user'])) {
    header("Location: login");
    exit();
}
$userName = $_SESSION['user']['name'];
$userSurname = $_SESSION['user']['surname'];
$userEmail = $_SESSION['user']['email'];
$userType = $_SESSION['user']['type'];
?>

<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc73b75636.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/logo.js" defer></script>
    <script type="text/javascript" src="./public/js/search_rv.js" defer></script>
    <link rel="stylesheet" type="text/css" href="/public/css/my_reservation.css">
    <title>ReservEat</title>
</head>

<body>
<div class="desktop">
    <nav>
        <div class="logo">
            <img src="/public/img/logo.svg">
            <p>ReservEat</p>
        </div>
        <ul>
            <li>
                <a href="/home_page" class="button">
                    <i class="fa-solid fa-house"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="/restaurant_page" class="button">
                    <i class="fa-solid fa-utensils"></i>
                    Restaurants
                </a>
            </li>
            <li class='chosen'>
                <a href="/my_reservation" class="button">
                    <i class="fa-regular fa-calendar"></i>
                    My reservation
                </a>
            </li>
            <?php
            if ($userType == 2) {
                echo '<li>
                            <a href="/add_restaurant" class="button">
                                <i class="fa-solid fa-plus"></i>
                                Add restaurant
                            </a>
                        </li>';
            }
            ?>
            <li>
                <a href="/profile_page" class="button">
                    <i class="fa-solid fa-user"></i>
                    My profile
                </a>
            </li>
            <li>
                <a href="/logout" class="button">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Sign out
                </a>
            </li>
            <li class="userID">
                <?php
                echo $userName.' '.$userSurname;
                ?>
                <p><?php echo $userEmail; ?></p>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class='search_bar'>
                <input name="Search by name" type="text" placeholder="Search by name">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </header>
        <p>My reservation</p>
        <section class="reservations">
            <?php if(isset($reservations))
                foreach ($reservations as $reservation): ?>
                    <a>
                        <div class="reservation">
                            <img src="<?= $reservation->getResLogo(); ?>" alt="LOGO RESTAURACJI">
                            <div class="info">
                                <div class="infoB">
                                    <p class="n"><?= $reservation->getResName(); ?></p>
                                    <p class="d">Reservation date : <?= $reservation->getDate()->format('d/m/y'); ?> <?= $reservation->getHour()->format('H:i:s') ?></p>
                                    <p class="p">Number of people : <?= $reservation->getNumberPeople(); ?></p>
                                </div>
                                <button class="cancel-btn">Cancel reservations</button>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
        </section>
    </main>
</div>
</body>

<template id="reservation_template">
    <a>
        <div class="reservation">
            <img src="" alt="LOGO RESTAURACJI">
            <div class="info">
                <div class="infoB">
                    <p class="n">Name</p>
                    <p class="d">Reservation date : Data hour</p>
                    <p class="p">Number of people : 0</p>
                </div>
                <button class="cancel-btn">Cancel reservations</button>
            </div>
        </div>
    </a>
</template>