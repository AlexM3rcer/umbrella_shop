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
    <link rel="stylesheet" href="styleCart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sevillana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="app.js" defer></script>
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
                    $current_page=false;

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
                    $link='cart.php';
                    $current_page=true;

                    echo $link;

                    ?>"<?php

                    if( $current_page )
                        echo ' class="selected_menu"';
                    ?>>Корзина
                </a>
            </li>
        </ul>
    </header>

    <main id="main-content">
        <?php
            include "..\db.php";
            if ($_SESSION['user_id'] != null) {
                
                $user_id = $_SESSION['user_id'];

                $result = mysqli_query($mysql, "SELECT * FROM `purchases` JOIN `items` ON (purchases.id_item = items.id) WHERE `id_user` = '$user_id'");
            }
        ?>

        <div id="cart">
            <?php 
                while($name = mysqli_fetch_assoc($result)){
            ?>
            <div class="item">
                <img class="item-photo" title="<?php echo $name['name'];?>" src="..\Images\<?php echo $name['url'];?>.jpg"/>
                <h2><?php echo $name['name'];?></h2>
                <p>Наш агент свяжется с вами для уточнения деталей. Ожидайте.</p>
            </div>
            <?php
                }
            ?>
        </div>  
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