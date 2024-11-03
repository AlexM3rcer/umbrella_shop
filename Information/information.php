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
    <link rel="stylesheet" href="styleInformation.css">
    <script src="jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="jquery.modal.min.css" />
    <script defer src="../js/modal.js"></script>
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
                        $current_page=true;

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

    <main id="main-content">
        <?php
            include "..\db.php";
            if ($_POST != null) {
                
                $user_id = $_SESSION['user_id'];
                $item_id = $_POST['item_id'];

                mysqli_query($mysql, "INSERT INTO `purchases`(id_item, id_user) VALUES ('$item_id', '$user_id')");
            }
            $result = mysqli_query($mysql, "SELECT * FROM `items`");
        ?>

        <div id="termins">
            <?php 
                while($name = mysqli_fetch_assoc($result)){
            ?>
            <div class="term">
                <img class="term-photo" title="<?php echo $name['name'];?>" src="..\Images\<?php echo $name['url'];?>.jpg"/>
                <div class="term-text">
                    <h2><?php echo $name['name'];?></h2>
                    <p class="price">Цена: <?php echo $name['price'];?><p>
                    <?php echo $name['description'];?>
                    <p><a href="#<?php echo $name['id'];?>" rel="modal:open">Показать полностью</a></p>
                </div>
            </div>
            <div id="<?php echo $name['id'];?>" class="modal">
                <div class="modal-content">
                    <img class="modal-photo" title="<?php echo $name['name'];?>" src="..\Images\<?php echo $name['url'];?>.jpg"/>
                    <div class="modal-text">
                        <h2 class="modal-h2"><?php echo $name['name'];?></h2>
                        <p class="modal-price">Цена: <?php echo $name['price'];?></p>
                        <p class="modal-description"><?php echo $name['full_description'];?></p>
                    </div>
                    <form class="modal-form" method="POST">
                        <input type="text" value="<?php echo $name['id'];?>" name="item_id" style="display: none;"></input>
                        <input type="submit" value="В корзину" class="modal-button"></input>
                    </form>
                    <a class="modal-close" href="#" rel="modal:close">Закрыть</a>
                </div>
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