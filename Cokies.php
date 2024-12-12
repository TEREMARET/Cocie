<?php
// Устанавливаем язык, если отправлена форма
if (isset($_POST['language'])) {
    $language = $_POST['language'];
    setcookie('language', $language, time() + 86400, "/"); // Куке хранится 1 день
    // Обновляем страницу, чтобы применить новый язык
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Определяем язык при загрузке страницы
$language = 'ru'; // По умолчанию русский
if (isset($_COOKIE['language'])) {
    $language = $_COOKIE['language'];
}

// Функция для получения текста на выбранном языке
function getText($key, $language) {
    $texts = [
        'ru' => [
            'title' => 'Выбор языка',
            'message' => 'Пожалуйста, выберите язык интерфейса:',
            'button_ru' => 'Русский',
            'button_en' => 'Английский',
        ],
        'en' => [
            'title' => 'Language Selection',
            'message' => 'Please select the interface language:',
            'button_ru' => 'Russian',
            'button_en' => 'English',
        ],
    ];
    
    return $texts[$language][$key];
}
?>

<!DOCTYPE html>
<html lang="<?= $language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getText('title', $language) ?></title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1><?= getText('title', $language) ?></h1>
<p><?= getText('message', $language) ?></p>

<form method="post">
    <button type="submit" name="language" value="ru"><?= getText('button_ru', $language) ?></button>
    <button type="submit" name="language" value="en"><?= getText('button_en', $language) ?></button>
</form>

</body>
</html>