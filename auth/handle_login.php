<?php
session_start();
require_once '../includes/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    if ($user['role'] === 'admin') {
        header('Location: ../admin/dashboard.php');
    } else if ($user['role'] === 'judge') {
        header('Location: ../judge/dashboard.php');
    } else {
        echo "Unknown role.";
    }
} else {
    header('Location: ../login.php?error=1');
    exit();
}
?>