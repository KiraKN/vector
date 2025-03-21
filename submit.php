<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    $sql = "INSERT INTO clients (name, phone, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $phone, $date);

    if ($stmt->execute()) {
        $_SESSION['form_message'] = "Заявка успешно отправлена!";
    } else {
        $_SESSION['form_message'] = "Ошибка: " . $stmt->error;
    }

    $stmt->close();
} else {
    $_SESSION['form_message'] = "Недопустимый метод запроса";
}

$conn->close();
header('Location: index.php');
exit;
?>

