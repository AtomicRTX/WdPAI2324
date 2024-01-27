<?php

if(isset($_SESSION['logged']) && $_SESSION['logged']){
    header("Location: home_page");
    exit();
}
?>

<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/public/js/detector.js" defer></script>
    <link rel="stylesheet" type="text/css" href="/public/css/register.css">
    <title>ReservEat</title>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="logo">
                <img src="/public/img/logo.svg" alt="LOGO">
                <p>Sign up to ReservEat</p>
            </div>
            <div class="register-container">
                <form action="/register" method="POST">
                    <input name="name" type="text" placeholder="Name">
                    <input name="surname" type="text" placeholder="Surname">
                    <input name="email" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password">
                    <input name="confirmedPassword" type="password" placeholder="Confirmed password">
                    <input name="phoneNumber" type="text" placeholder="Phone number">

                    <?php if (isset($messages)){
                        foreach ($messages as $message){
                            echo '<span style="color: red;">' . $message . '</span>';
                        }
                    }
                    ?>
                    <a href="#">
                        <button type="submit" class="Up">
                            Sign Up
                        </button>
                    </a>
                    <div class="login">
                        <p>You already have an account ?</p>
                    </div>
                </form>
                <a href="/login">
                    <button class="In">Sign in</button>
                </a>
            </div>
        </div>
    </div>
</body>