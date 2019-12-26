<?php

include('db.php');

$id = (int)$_GET['id'];
$addView = mysqli_query($db, "UPDATE goods SET view=view+1 WHERE id={$id}");
$result = mysqli_query($db, "SELECT * FROM goods WHERE id={$id}");

if ($result->num_rows != 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    Die("Такой записи не существует");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item</title>
</head>
<body>

<header>
    <h2><a href="/catalog.php">В каталог</a></h2>
    <hr>
</header>

<div>
    <h3><?= $row['name'] ?></h3>
    <img src="./gallery_img/big/<?= $row['img'] ?>" alt="alt">
    <p><b>Цена: </b><?= $row['price'] ?> рублей</p>
</div>
<hr>
<p>Количество просмотров: <?= $row['view'] ?></p>

<footer>
    <hr>
    <hr>
    <h3>Все права защищены злыми утками</h3>
    <p><?= $date ?></p>
</footer>

</body>
</html>