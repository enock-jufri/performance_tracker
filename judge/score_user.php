<?php
require_once '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participant_id = (int) $_POST['participant_id']; // user_id is actually participant_id now
    $points = (int) $_POST['points'];
    // Get judge_id from session (logged in judge)
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'judge') {
        header("Location: dashboard.php?error=not_judge");
        exit;
    }
    $judge_id = $_SESSION['user']['id'];

    if ($points > 0 && $points <= 100) {
        $stmt = $pdo->prepare("INSERT INTO scores (judge_id, participant_id, points) VALUES (?, ?, ?)");
        $stmt->execute([$judge_id, $participant_id, $points]);
        header("Location: dashboard.php?success=1");
    } else {
        header("Location: dashboard.php?error=1");
    }
    exit;
}
