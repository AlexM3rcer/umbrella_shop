<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        echo '<title>Umbrella corp</title>'; 
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение  -->
    <link rel="stylesheet" href="styleReg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sevillana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<header id="main-header">
        <ul class="lists" id="header-list">
        <li id="menu"><a href="<?php
                    $link='..\index.php';
                    $current_page=false;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Главная
                </a>
            </li>
            <li><a href="<?php
                    $link='..\Login\login.php';
                    $current_page=false;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Авторизация
                </a>
            </li>
            <li><a href="<?php
                    $link='..\Register\reg.php';
                    $current_page=true;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Регистрация
                </a>
            </li>
            <li><a href="<?php
                    $link='..\Information\information.php';
                    $current_page=false;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Наши предложения
                </a>
            </li>
            <li>
            <a href="<?php
                    $link='..\Cart\cart.php';
                    $current_page=false;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Корзина
                </a>
            </li>
        </ul>
    </header>
    <main>
        <?php
            include "..\db.php";
        ?>
        <form id="reg-form" method="POST">
            <label><input type="text" id="reg_name_input" name="login">Login</label>
            <label><input type="password" id="reg_password_input" name="password">Password</label>
            
            <input type="submit" id="reg" value="Register">
            <?php
                if ($_POST != null) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    
                    try {
                        $result = mysqli_query($mysql, "INSERT INTO `users`(`login`, `password`) VALUES ('$login', '$password')");
                        echo "<h1>Операция выполнена успешно</h1>";
                    } catch (Exception) {
                        echo "<h1>Операция не выполнена.</h1>";
                    }
                }
            ?>
        </form>
    </main>
    <footer id="info">
        <p id="slogan">
            Our Business Is Life Itself
        </p>
        <ul class="lists">
            <li>+7 (985) 899-07-18</li>
            <li>froykergames@gmail.com</li>
        </ul>
        
        <p>ООО "Umbrella Corp." 2012-2024.<br>Все права защищены.</p>
    </footer>
</body>