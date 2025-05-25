<?php
require_once '../includes/db.php';

// Fetch participants and their total points from all judges
$stmt = $pdo->query("
    SELECT participants.username, participants.display_name, SUM(scores.points) AS total_points
    FROM participants
    LEFT JOIN scores ON participants.id = scores.participant_id
    GROUP BY participants.id
    ORDER BY total_points DESC
");
$participants = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Scoreboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
        }

        .scoreboard-header {
            background: #212529;
            border-radius: 0.5rem;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
        }

        .scoreboard-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
        }

        .table-dark th,
        .table-dark td {
            vertical-align: middle;
        }
    </style>
    <script src="../assets/js/scoreboard.js" defer></script>
</head>

<body class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Performance Tracker</a>
            <div class="ms-auto">
                <a href="../login.php" class="btn btn-outline-light">Login</a>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="scoreboard-header text-center mb-4">
            <span class="scoreboard-title">🏆 Scoreboard</span>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Participant</th>
                        <th>Total Points</th>
                    </tr>
                </thead>
                <tbody id="scoreboard-body">
                    <?php foreach ($participants as $i => $participant): ?>
                        <?php
                            $rowClass = '';
                            if ($i === 0) $rowClass = 'table-success'; // Deep green
                            elseif ($i === 1) $rowClass = 'table-success'; // Medium green
                            elseif ($i === 2) $rowClass = 'table-success'; // Light green
                        ?>
                        <tr class="<?= $rowClass ?>" style="<?php
                            if ($i === 0) echo 'background-color: #14532d';
                            elseif ($i === 1) echo 'background-color: #22c55e;';
                            elseif ($i === 2) echo 'background-color: #bbf7d0';
                        ?>">
                            <td><?= htmlspecialchars($participant['display_name']) ?></td>
                            <td><?= (int)$participant['total_points'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>