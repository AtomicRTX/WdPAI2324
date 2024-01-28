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
    <link rel="stylesheet" type="text/css" href="/public/css/restaurant_details.css">
    <title>ReservEat</title>
</head>

<body>
    <div class="desktop">
        <nav>
            <div class="logo">
                <img src="/public/img/logo.svg" alt="LOGO">
                <p>ReservEat</p>
            </div>
            <ul>
                <li>
                    <a href="/home_page" class="button">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <li class='chosen'>
                    <a href="/restaurant_page" class="button">
                        <i class="fa-solid fa-utensils"></i>
                        Restaurants
                    </a>
                </li>
                <li>
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
                <div class="userID">
                    <?php
                    echo $userName.' '.$userSurname;
                    ?>
                    <p><?php echo $userEmail; ?></p>
                </div>
            </ul>
        </nav>
        <main>
            <header style="background-image: url('<?= $restaurant->getResImage(); ?>'); background-size: cover;">
                    <a href="/home_page">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </a>
            </header>
            <div class="panel">
                <nav>
                    <ul>
                        <div class='chosen'>
                            <li class='chosen'>
                                <a href="/restaurant_details?id=<?php if(isset($restaurant)) $restaurant->getResId();?>" class="button">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Info
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="/restaurant_reservation?id=<?=$restaurant->getResId();?>" class="button">
                                <i class="fa-regular fa-calendar"></i>
                                Reservation
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="restaurant-details">
                    <h1><?php echo $restaurant->getResName(); ?></h1>
                    <p><?php echo $restaurant->getResd(); ?></p>
                    <p><?php echo $restaurant->getResLocation(); ?></p>
                </div>
            </div>
    </div>
</body>