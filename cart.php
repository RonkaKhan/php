<?php

include('db.php');

$date = date("Y");

$cartText = "К сожалению, в корзине пусто";

$result = mysqli_query($db, "SELECT * FROM cart");
var_dump($result);

?>
<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
<header>
    <h1>Корзина</h1>
    <a href="/">Главная</a>
    <a href="/catalog.php">Каталог</a>
    <a href="/feedback.php">Отзывы</a>
    <hr>
    <hr>
</header>
<p><?=$cartText?></p>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <? var_dump($row);?>

    <h3><a href="item.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h3>
    <a href="item.php?id=<?= $row['id'] ?>"><img src="./gallery_img/small/<?= $row['img'] ?>" alt="alt"></a><br>
    <p>Количество просмотров: <?= $row['view'] ?></p>
    <button>Купить</button>
    <hr>
<?php endwhile; ?>

<footer>
    <hr>
    <hr>
    <h3>Все права защищены злыми утками</h3>
    <p><?= $date ?></p>
</footer>
</body>
</html>
