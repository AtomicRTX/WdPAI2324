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
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <link rel="stylesheet" type="text/css" href="/public/css/home_page.css">
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
                <li class='chosen'>
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
                <div class='search_bar'>
                    <input name="Search by name" type="text" placeholder="Search by name">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </header>
            <div class="categories_name">Categories</div>
            <div class="categories">
                <a href="/categories_page?cat=italian" class="cat">
                    <img src="/public/img/category/pizza.svg" alt="ITALIAN">
                    <p>Italian</p>
                </a>
                <a href="/categories_page?cat=indian" class="cat">
                    <img src="/public/img/category/indian.svg" alt="INDIAN">
                    <p>Indian</p>
                </a>
                <a href="/categories_page?cat=sushi" class="cat">
                    <img src="/public/img/category/sushi.svg" alt="SUSHI">
                    <p>Sushi</p>
                </a>
                <a href="/categories_page?cat=mexican" class="cat">
                    <img src="/public/img/category/mexican.svg" alt="MEXICAN">
                    <p>Mexican</p>
                </a>
                <a href="/categories_page?cat=thai" class="cat">
                    <img src="/public/img/category/thai.svg" alt="THAI">
                    <p>Thai</p>
                </a>
                <a href="/categories_page?cat=vietnamese" class="cat">
                    <img src="/public/img/category/vietnamese.svg" alt="VIETNAMESE">
                    <p>Vietnamese</p>
                </a>
                <a href="/categories_page?cat=seafood" class="cat">
                    <img src="/public/img/category/seafood.svg" alt="SEAFOOD">
                    <p>Seafood</p>
                </a>
                <a href="/categories_page?cat=chinese" class="cat">
                    <img src="/public/img/category/chinese.svg" alt="CHINESE">
                    <p>Chinese</p>
                </a>
                <a href="/categories_page?cat=burgers" class="cat">
                    <img src="/public/img/category/burgers.svg" alt="BURGERS">
                    <p>Burgers</p>
                </a>
                <a href="/categories_page?cat=vegetarian" class="cat">
                    <img src="/public/img/category/vegetarian.svg" alt="VEGETARIAN">
                    <p>Vegetarian</p>
                </a>
            </div>
            <p>Top rated restaurants</p>
            <section class="restaurants">
                <?php if(isset($restaurants))
                    foreach ($restaurants as $restaurant): ?>
                        <a href="/restaurant_details?id=<?=$restaurant->getResId();?>">
                            <div class="restaurant">
                                <img src="<?= $restaurant->getResLogo(); ?>" alt="LOGO RESTAURACJI">
                                <div class="info">
                                    <div class="infoB">
                                        <p class="n"><?= $restaurant->getResName(); ?></p>
                                        <p class="l"><?= $restaurant->getResLocation(); ?></p>
                                    </div>
                                    <p class="r">
                                        Rating according to users : <?= $restaurant->getResRating(); ?>stars</p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>

            </section>
        </main>
    </div>
</body>


<template id="restaurant_template">
    <a href="">
        <div class="restaurant">
            <img src="" alt="LOGO RESTAURACJI">
            <div class="info">
                <div class="infoB">
                    <p class="n">name</p>
                    <p class="l">location</p>
                </div>
                <p class="r">
                    Rating according to users : 0 stars</p>
            </div>
        </div>
    </a>
</template>