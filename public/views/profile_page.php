<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/profile_page.css">
    <title>MY PROFILE PAGE</title>
</head>

<body>
    <div class="desktop">
        <div class="panel">
            <div class="logo">
                <img src="public/img/logo.svg">
                <p>ReservEat</p>
            </div>
            <div class="menu_bar">
                <a href="home" class="home">
                    <img src="public/img/home.svg">
                    <p>Home</p>
                </a>
                <a href="restaurants" class="restaurants">
                    <img src="public/img/restaurants.svg">
                    <p>Restaurants</p>
                </a>
                <a href="My reservation" class="reservation">
                    <img src="public/img/my_reservation.svg">
                    <p>My reservation</p>
                </a>
            </div>
            <div class="user_bar">
                <div class="act">
                    <a href="My profile" class="profile">
                        <img src="public/img/profile.svg">
                        <p>My profile</p>
                    </a>
                </div>
                <a href="Log out" class="logout">
                    <img src="public/img/logout.svg">
                    <p>Log out</p>
                </a>
                <div class="userID">
                    Dawid Kubacki
                    <p>dawid.kubacki54@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="right_panel">
            <div class="search_bar">
                <form>
                    <input name="Search by name" type="text" placeholder="Search by name">
                    <img src="public/img/magnifier.svg">
                </form>
            </div>
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
                    <a href="edit" class="edit">
                        Edit
                    </a>
                </div>
                
                <div class="basicInformation">
                    <div class="data">
                        <div class="name">
                            Name : Dawid
                        </div>
                        <div class="surname">
                            Surname : Kubacki
                        </div>
                        <div class="e-mail">
                            E-mail : dawid.kubacki54@gmail.com
                        </div>
                        <div class="phone">
                            Phone number : 737 273 172
                        </div>
                    </div>
                    <div class="photo">
                        <img src="public/img/photo.svg">
                        <a href="edit_photo" class="edit_photo">
                            Change photo
                        </a>
                    </div>
                </div>
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