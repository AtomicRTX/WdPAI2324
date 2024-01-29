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
    <link rel="stylesheet" type="text/css" href="/public/css/restaurant_page.css">
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
        </header>
        <p>Restaurants from the selected category</p>
        <section>
            <?php if (isset($restaurants))
            foreach ($restaurants as $restaurant): ?>
                <a href="/restaurant_details?id=<?=$restaurant->getResId();?>">
                    <div class="restaurant">
                        <img src="<?= $restaurant->getResLogo(); ?>" alt="Opis obrazka">
                        <div class="info">
                            <div class="infoB">
                                <p><?= $restaurant->getResName(); ?></p>
                                <p><?= $restaurant->getResLocation(); ?></p>
                            </div>
                            <div class="r">
                                <i class="fa-regular fa-thumbs-up">  <?= $restaurant->getResLike(); ?></i>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

        </section>
    </main>

