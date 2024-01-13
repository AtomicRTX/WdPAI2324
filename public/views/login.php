<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="logo">
                <img src="public/img/logo.svg">
                <p>Sign in to ReservEat</p>
            </div>
            <div class="login-container">
                <form class="login" action="login" method="POST">
                    <input name="email" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password">
                    <?php if (isset($messages)){
                        foreach ($messages as $message){
                            echo '<span style="color: red;">' . $message . '</span>';
                        }
                    }
                    ?>
                    <a href="#"><button type="submit" class="In">Sign in</button></a>
                </form>
                <div class="register">You don't have an account ?</div>
                <a href="register" class="linkUp">
                    <button class="Up">Sign up</button>
                </a>
            </div>
        </div>
    </div>
</body>