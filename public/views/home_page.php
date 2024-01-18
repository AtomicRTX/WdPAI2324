<?php

if (!isset($_SESSION['user'])) {
    header("Location: login");
    exit();
}
$userName = $_SESSION['user']['name'];
$userSurname = $_SESSION['user']['surname'];
$userEmail = $_SESSION['user']['email'];

?>


<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc73b75636.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/home_page.css">
    <title>HOME PAGE</title>
</head>

<body>

    <div class="desktop">
        <nav>
            <div class="logo">
                <img src="public/img/logo.svg">
                <p>ReservEat</p>
            </div>
            <ul>
                <div class='chosen'>
                    <li>
                        <a href="home_page" class="button">
                            <i class="fa-solid fa-house"></i>
                            Home
                        </a>
                    </li>
                </div>
                <li>
                    <a href="restaurant_page" class="button">
                        <i class="fa-solid fa-utensils"></i>
                        Restaurants
                    </a>
                </li>
                <li>
                    <a href="#" class="button">
                        <i class="fa-regular fa-calendar"></i>
                        My reservation
                    </a>
                </li>
                <li>
                    <a href="#" class="button">
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
                <div class="userID">
                    <?php
                    echo $userName.' '.$userSurname;
                    ?>
                    <p><?php echo $userEmail; ?></p>
                </div>
            </ul>
        </nav>
        <main>
            <header>
                <form class='search_bar'>
                    <input name="Search by name" type="text" placeholder="Search by name">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </header>
            <div class="categories_name">Categories</div>
            <div class="categories">
                <a href="italian" class="cat">
                    <img src="public/img/category/pizza.svg" alt="Opis zdjecia">
                    <p>Italian</p>
                </a>
                <a href="indian" class="cat">
                    <img src="public/img/category/indian.svg" alt="Opis zdjecia">
                    <p>Indian</p>
                </a>
                <a href="sushi" class="cat">
                    <img src="public/img/category/sushi.svg" alt="Opis zdjecia">
                    <p>Sushi</p>
                </a>
                <a href="mexican" class="cat">
                    <img src="public/img/category/mexican.svg" alt="Opis zdjecia">
                    <p>Mexican</p>
                </a>
                <a href="thai" class="cat">
                    <img src="public/img/category/thai.svg" alt="Opis zdjecia">
                    <p>Thai</p>
                </a>
                <a href="vietnamese" class="cat">
                    <img src="public/img/category/vietnamese.svg" alt="Opis zdjecia">
                    <p>Vietnamese</p>
                </a>
                <a href="seafood" class="cat">
                    <img src="public/img/category/seafood.svg" alt="Opis zdjecia">
                    <p>Seafood</p>
                </a>
                <a href="chinese" class="cat">
                    <img src="public/img/category/chinese.svg" alt="Opis zdjecia">
                    <p>Chinese</p>
                </a>
                <a href="burgers" class="cat">
                    <img src="public/img/category/burgers.svg" alt="Opis zdjecia">
                    <p>Burgers</p>
                </a>
                <a href="vegetarian" class="cat">
                    <img src="public/img/category/vegetarian.svg" alt="Opis zdjecia">
                    <p>Vegetarian</p>
                </a>
            </div>
            <p>Najlepiej oceniane restauracje</p>
            <section>
                <?php
                foreach ($restaurants as $restaurant): ?>
                    <a href="restaurant_details?id=<?=$restaurant->getResId();?>">
                        <div class="restaurant">
                            <img src="<?= $restaurant->getResLogo(); ?>" alt="Opis obrazka">
                            <div class="info">
                                <div class="infoB">
                                    <p><?= $restaurant->getResName(); ?></p>
                                    <p><?= $restaurant->getResLocation(); ?></p>
                                </div>
                                <p>Rating według uzytkowników : <?= $restaurant->getResRating(); ?> gwiazdek</p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>

            </section>
            </div>
        </div>
    </div>
    <div class="mobile">
        <div class="welcome">
            <p>Hello Dawid!</p>
            Find restaurant for any occasion
        </div>
        <div class="search_bar">
            <form>
                <input name="Search by name" type="text" placeholder="Search by name">
                <img src="public/img/magnifier.svg">
            </form>
        </div>
        <div class="categories_name">Categories</div>
        <div class="categories">
            <a href="Pizza" class="cat">
                <img src="public/img/pizza.svg" alt="Opis zdjecia">
                <p>Pizza</p>
              </a>
        </div>
        <div class="explore_name">Explore</div>
        <div class="explore">
            <a href="best" class="best">
                <img src="public/img/best_rated.svg" alt="Opis zdjecia">
                <p>Best rated</p>
            </a>
            <a href="discount" class="discount">
                <img src="public/img/discount.svg" alt="Opis zdjecia">
                <p>Discounts</p>
            </a>
        </div>
        <div class="bottom_panel">
            <div class="menu_bar">
                <a href="home" class="home">
                    <img src="public/img/home.svg">
                    <p>Home</p>
                </a>
                <a href="My reservation" class="reservation">
                    <img src="public/img/my_reservation.svg">
                    <p>My reservation</p>
                </a>
                <a href="My profile" class="profile">
                    <img src="public/img/profile.svg">
                    <p>My profile</p>
                </a>
            </div>
        </div>
    </div>
</body>