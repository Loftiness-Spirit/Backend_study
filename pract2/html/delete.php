<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Подключение к базе данных
$conn = new mysqli("db", "user", "password", "universityDB");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение ID студента из запроса
$id = $_POST["id"];

// SQL-запрос для удаления студента по ID
$sql = "DELETE FROM students WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    // Перенаправление на страницу чтения списка студентов после успешного удаления
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
    <title>Удалить данные студента</title>
</head>
<body>
    <h2>Удалить данные студента</h2>
    <form method="post">
        ID: <input type="text" name="id" value="<?php echo $id; ?>"><br>
        <input type="submit" value="Удалить">
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