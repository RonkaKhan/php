<?php
$date = date("Y");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<header>
    <h1>Главная</h1>
    <a href="/">Главная</a>
    <a href="/catalog.php">Каталог</a>
    <a href="/feedback.php">Отзывы</a>
    <a href="/cart.php">Корзина</a>
    <hr>
    <hr>
</header>

<h2>Магазин ёлочных игрушек</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam architecto blanditiis commodi deserunt
    dolore doloremque, eos fugit harum nam neque nesciunt, praesentium quia quibusdam quisquam rerum sed tempore
    vitae!
</p>

<footer>
    <hr>
    <hr>
    <h3>Все права защищены злыми утками</h3>
    <p><?= $date ?></p>
</footer>
</body>
</html>
