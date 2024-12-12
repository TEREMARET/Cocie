<?php
if (isset($_POST['theme'])) {
    setcookie('theme', $_POST['theme'], time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    if ($_POST['theme'] == 'del') {
        setcookie("theme", "", [
            "expires" => time() - 3600, 
            "path" => "/"
        ]);
    
    }
}

$text = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['button1'])) {
        $text = "Привет, мир";
    } elseif (isset($_POST['button2'])) {
        $text = "Hello, world";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Сайт</title>
    <meta charset="utf-8">
    <style>
        body {
            background-color: <?php echo $_COOKIE['theme']; ?>;
        }
    </style>
</head>
<body>
    <form method="POST">
        <button name="button1" value="ru">Русский</button>
        <button name="button2" value="en">Англиский</button>
        <button name="theme" value="del">Удалить cookie</button>
    </form>
    <div id="text-output"><?= $text ?></div>
</body>
</html>