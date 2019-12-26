<?php


include('db.php');

$table = mysqli_query($db, "SELECT * FROM feedback ORDER BY id DESC");

function saveData($db, $data)
{
    return strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $data)));
}

$row = [];
$buttonText = "Отправить";
$action = "add";

if ($_GET['action'] === 'edit') {
    $id = (int)$_GET['id'];
    $readSQL = "SELECT * FROM feedback WHERE id = {$id}";
    $editFeedback = mysqli_query($db, $readSQL);
    $row = mysqli_fetch_assoc($editFeedback);
    $buttonText = "Изменить";
    $action = "save";
}

if ($_GET['action'] === 'save') {
    $id = (int)$_POST['id'];
    $name = saveData($db, $_POST['name']);
    $feedback = saveData($db, $_POST['feedback']);
    $updateSQL = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
    $updateFeedback = mysqli_query($db, $updateSQL);
    header("Location: /feedback.php?message=edit");
}

if ($_GET['action'] === 'add') {
    $name = saveData($db, $_POST['name']);
    $feedback = saveData($db, $_POST['feedback']);
    $insertSQL = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
    $addFeedback = mysqli_query($db, $insertSQL);
    header("Location: /feedback.php?message=OK");
}

if ($_GET['action'] === 'delete') {
    // var_dump($_GET);
    $id = (int)$_GET['id'];
    $readSQL = "DELETE FROM `feedback` WHERE `feedback`.`id` = {$id}";
    $editFeedback = mysqli_query($db, $readSQL);
    header("Location: /feedback.php?message=del");
}


$message = [
    "OK" => "Сообщение добавлено",
    "edit" => "Сообщение изменено",
    "del" => "Сообщение удалено"
];

$date = date("Y");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback</title>
</head>
<body>
<header>
    <h1>Отзывы</h1>
    <a href="/">Главная</a>
    <a href="/catalog.php">Каталог</a>
    <a href="/cart.php">Корзина</a>
    <hr>
    <hr>
</header>


<p>Оставьте свой отзыв</p>
<b>Форма обратной связи</b><br>
<?= $message[$_GET['message']] ?>
<form action="?action=<?= $action ?>" method="post">
    <input hidden type="text" name="id" value="<?= $row['id'] ?>">
    <input placeholder="Имя" type="text" name="name" value="<?= $row['name'] ?>">
    <input placeholder="Отзыв" type="text" name="feedback" value="<?= $row['feedback'] ?>">
    <input type="submit" name="ok" value="<?= $buttonText ?>">
</form>
<? foreach ($table as $item): ?>
    <div>
        <b><?= $item['name'] ?></b>: <?= $item['feedback'] ?>
        <a href="/feedback.php/?action=edit&id=<?= $item['id'] ?>">[ред.]</a>
        <a href="/feedback.php/?action=delete&id=<?= $item['id'] ?>" id="del">
            <!-- onclick="confirm('Вы уверены, что хотите удалить сообщение?');" --> [x]</a>
    </div>
<? endforeach; ?>
<hr>

<footer>
    <hr>
    <hr>
    <h3>Все права защищены злыми утками</h3>
    <p><?= $date ?></p>
</footer>

<script>
    el = document.getElementById('del');
    console.log(el);
    function clickAction() {
        let confirmation = window.confirm('Вы уверены, что хотите удалить сообщение?');
        if (!confirmation) {

        }
    }

    el.addEventListener('click', clickAction)
</script>

</body>
</html>