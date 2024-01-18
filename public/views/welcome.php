<?php

if(isset($_SESSION['logged']) && ($_SESSION['logged'] == true)){
    header("Location: home_page");
    exit();
}
?>

<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/welcome.css">
    <title>WELCOME PAGE</title>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="logo">
                <img src="public/img/logo.svg">
                <p>ReservEat</p>
            </div>
            <div class="motto">Your Culinary Journey Begins Here: Reserve, Savor, Repeat!</div>
            <div class="welcome-container">
                <a href="login">
                    <button class="In">Sign in</button>
                </a>
                <div class="wRegister">
                    <p>You don't have an account ?</p>
                </div>
                <a href="register">
                    <button class="Up">Sign up</button>
                </a>
            </div>
        </div>
    </div>
</body>