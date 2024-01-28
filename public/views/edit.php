<?php

if (!isset($_SESSION['user'])) {
    header("Location: login");
    exit();
}
$userName = $_SESSION['user']['name'];
$userSurname = $_SESSION['user']['surname'];
$userEmail = $_SESSION['user']['email'];
$userPhone = $_SESSION['user']['phone'];
$userType = $_SESSION['user']['type'];
?>


<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc73b75636.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/logo.js" defer></script>
    <link rel="stylesheet" type="text/css" href="public/css/edit.css">
    <title>ReservEat</title>
</head>

<body>
    <div class="desktop">
        <nav>
            <div class="logo">
                <img src="public/img/logo.svg">
                <p>ReservEat</p>
            </div>
            <ul>
                <li>
                    <a href="home_page" class="button">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="restaurant_page" class="button">
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
                                <a href="add_restaurant" class="button">
                                    <i class="fa-solid fa-plus"></i>
                                    Add restaurant
                                </a>
                            </li>';
                }
                ?>
                <li class='chosen'>
                    <a href="profile_page" class="button">
                        <i class="fa-solid fa-user"></i>
                        My profile
                    </a>
                </li>
                <li>
                    <a href="logout" class="button">
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
            <div class="profile">
                <div class="my">
                    My profile
                </div>
                <div class="update">
                    Update your profile information
                </div>
                <div class="title">
                    <div class="title_basic">
                        Basic information
                    </div>
                </div>

                <section>
                    <div class="basicInformation">
                        <form action="edit" method="post">
                            <div class="data">
                                <label for="userName">Name :</label>
                                <input type="text" id="userName" name="name" value="<?php echo $userName; ?>" required>
                                <label for="userSurname">Surname :</label>
                                <input type="text" id="userSurname" name="surname" value="<?php echo $userSurname; ?>" required>
                                <label for="userEmail">E-mail :</label>
                                <input type="email" id="userEmail" name="email" value="<?php echo $userEmail; ?>" required>
                                <label for="userPhone">Phone number :</label>
                                <input type="text" id="userPhone" name="phoneNumber" value="<?php echo $userPhone; ?>" required>
                            </div>
                        <button type="submit">Save Changes</button>
                        </form>
                    </div>
                    <img src="public/img/addrestaurant.svg" alt="User Photo">
                </section>
            </div>
        </main>
    </div>
</body>