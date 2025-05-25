<?php
require_once '../includes/db.php';

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $display_name = trim($_POST['display_name']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($display_name) || empty($password)) {
        $message = "All fields are required.";
    } else {
        // Check for duplicate in users table (not judges)
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $message = "Judge username already exists.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Insert into users table as a judge (per schema)
            $stmt = $pdo->prepare("INSERT INTO users (username, password, display_name, role) VALUES (?, ?, ?, 'judge')");
            if ($stmt->execute([$username, $hashedPassword, $display_name])) {
                $success = true;
                $message = "Judge added successfully!";
            } else {
                $message = "Failed to add judge. Try again.";
            }
        }
    }
}
// Show message and redirect back to dashboard
if ($message) {
    session_start();
    $_SESSION['add_judge_message'] = $message;
    $_SESSION['add_judge_success'] = $success;
    header('Location: dashboard.php');
    exit();
}