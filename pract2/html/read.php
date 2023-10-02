<?php
// Подключение к базе данных
$conn = new mysqli("db", "user", "password", "universityDB");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// SQL-запрос для выборки всех студентов
$sql = "SELECT id, first_name, last_name, course FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Список студентов</title>
</head>
<body>
    <h2>Список студентов</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Курс</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Нет данных.";
        }
        ?>
    </table>
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