<?php

if (!isset($_SESSION['user'])) {
    header("Location: login");
    exit();
}
$userName = $_SESSION['user']['name'];
$userSurname = $_SESSION['user']['surname'];
$userEmail = $_SESSION['user']['email'];
$userType = $_SESSION['user']['type'];
$userID = $_SESSION['user']['id'];
?>

<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc73b75636.js" crossorigin="anonymous"></script>
    <script>
        const startHour = <?= $restaurant->getResStart()->format('H'); ?>;
        const endHour = <?= $restaurant->getResEnd()->format('H'); ?>;
    </script>
    <script type="text/javascript" src="/public/js/restaurantTime.js" defer></script>
    <script type="text/javascript" src="/public/js/logo.js" defer></script>
    <link rel="stylesheet" type="text/css" href="/public/css/restaurant_reservation.css">
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
                <li class='chosen'>
                    <a href="/restaurant_page" class="button">
                        <i class="fa-solid fa-utensils"></i>
                        Restaurants
                    </a>
                </li>
                <li>
                    <a href="my_reservation" class="button">
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
                <li class="mp">
                    <a href="/profile_page" class="button">
                        <i class="fa-solid fa-user"></i>
                        My profile
                    </a>
                </li>
                <li class="so">
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
                        <li>
                            <a href="/restaurant_details?id=<?=$restaurant->getResId();?>" class="button">
                                <i class="fa-solid fa-circle-info"></i>
                                Info
                            </a>
                        </li>
                        <div class='chosen'>
                        <li>
                            <a href="/restaurant_reservation?id=<?=$restaurant->getResId();?>" class="button">
                                <i class="fa-regular fa-calendar"></i>
                                Reservation
                            </a>
                        </li>
                        </div>
                    </ul>
                </nav>

                <div class="restaurant-details">
                    <form action="/restaurant_reservation?id=<?=$restaurant->getResId();?>" method="POST">
                        <label for="numberOfPeople">Number of people :</label>
                        <select id="numberOfPeople" name="selectedNumberOfPeople">
                            <option value="2">2 osoby</option>
                            <option value="4">4 osoby</option>
                            <option value="6">6 osób</option>
                        </select>
                        <label for="datePicker">Select a date(if not select, choose current date):</label>
                        <input name="selectedDate" type="date" class="datePicker">
                        <label for="selectTime">Select a time:</label>
                        <select id="selectTime" name="selectedTime"></select>
                        <div style="text-align: center;">
                            <span style="color: red;"><?php if(isset($messages)) echo $messages; ?></span>
                        </div>
                        <button class="reservation" type="submit">Book a reservation</button>
                    </form>
                </div>
            </div>
    </div>
</body>