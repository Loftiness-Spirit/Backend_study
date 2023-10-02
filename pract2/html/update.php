<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка отправленной формы для обновления данных студента
    $id = $_GET["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $course = $_POST["course"];

    // Подключение к базе данных
    $conn = new mysqli("db", "user", "password", "universityDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // SQL-запрос для обновления записи
    $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', course='$course' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Перенаправление на страницу чтения списка студентов после успешной вставки
        header("Location: read.php");
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Получение ID студента из запроса
    $id = $_GET["id"];

    // Подключение к базе данных
    $conn = new mysqli("db", "user", "password", "universityDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // SQL-запрос для выборки студентов по ID
    $sql = "SELECT id, first_name, last_name, course FROM students WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["first_name"];
        $description = $row["last_name"];
        $price = $row["course"];
    } else {
        echo "Студент не найден.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Обновить данные студента</title>
</head>
<body>
    <h2>Обновить данные студента</h2>
    <form method="get">
        ID: <input type="text" name="id" value="<?php echo $id; ?>"><br>
        <input type="submit" value="Найти">
    </form>
    <form method="post">
        Имя: <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
        Фамилия: <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
        Курс: <input type="text" name="course" value="<?php echo $course; ?>"><br>
        <input type="submit" value="Обновить">
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