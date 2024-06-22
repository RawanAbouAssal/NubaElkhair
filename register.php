<?php
include "datab.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noba Charity</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
            <h4 class="redirect">already have an account?</h4> 
            <a class="link" href="login.html">login</a>
                <form class="login" action="Save_user.php" method="post">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="email" class="login__input" id="Email" name="Email" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name= "UserName" placeholder="Username">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" id="Password" name="Password" placeholder="Password">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" id="Sex" name="Sex" placeholder="Gender">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Register</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>					
                </form>  
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>
</html>





