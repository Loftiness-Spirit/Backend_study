<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка отправленной формы для создания студента
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $course = $_POST["course"];
    // Подключение к базе данных
    $conn = new mysqli("db", "user", "password", "universityDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // SQL-запрос для создания записи
    $sql = "INSERT INTO students (first_name, last_name, course) VALUES ('$first_name', '$last_name', '$course')";

    if ($conn->query($sql) === TRUE) {
        // Перенаправление на страницу чтения списка студентов после успешной вставки
        header("Location: read.php");
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить студента</title>
</head>
<body>
    <h2>Добавить студента</h2>
    <form method="post">
        Имя: <input type="text" name="first_name"><br>
        Фамилия: <input type="text" name="last_name"></textarea><br>
        Курс: <input type="text" name="course"><br>
        <input type="submit" value="Создать">
    </form>
    <A href="read.php">
        Список студентов
    </A>
    <br/> 
    <A href="create.php">
        Добавление студента
    </A> 
    <br/> 
    <A href="update.php">
        Обновление данных студента
    </A> 
    <br/> 
    <A href="delete.php">
        Удаление данных студента
    </A>
    <br/>
</body>
</html>