<?php
// Подключение к базе данных
$servername = "localhost"; // Имя хоста базы данных (часто "localhost")
$username = "ваше_имя_пользователя"; // Имя пользователя базы данных
$password = "ваш_пароль"; // Пароль пользователя базы данных
$dbname = "ваша_база_данных"; // Имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Ваш JSON-массив данных
$data = [
    [
        "name" => "Товар 1",
        "price" => 10.99,
        "image" => "ссылка_на_изображение_1.jpg"
    ],
    [
        "name" => "Товар 2",
        "price" => 25.50,
        "image" => "ссылка_на_изображение_2.jpg"
    ],
    [
        "name" => "Нитокс",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ],
    [
        "name" => "Ивермек",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ],
    [
        "name" => "Креолин",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ],
    [
        "name" => "Чемиспрей",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ],
    [
        "name" => "Барс",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ],
    [
        "name" => "Ашивер",
        "price" => 5.99,
        "image" => "ссылка_на_изображение_3.jpg"
    ]
];

// Перебор массива и вставка данных в таблицу
foreach ($data as $item) {
    $name = $item["name"];
    $price = $item["price"];
    $image = $item["image"];

    $sql = "INSERT INTO products (name, price, image) VALUES ('$name', $price, '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Запись успешно добавлена: $name, $price, $image<br>";
    } else {
        echo "Ошибка при добавлении записи: " . $conn->error;
    }
}

// Закрытие соединения
$conn->close();
?>
