<?php

include('db.php');

$date = date("Y");

$result = mysqli_query($db, "SELECT * FROM goods ORDER BY view DESC");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<header>
    <h1>Каталог товаров</h1>
    <a href="/">Главная</a>
    <a href="/feedback.php">Отзывы</a>
    <a href="/cart.php">Корзина</a>
    <hr>
</header>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
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
