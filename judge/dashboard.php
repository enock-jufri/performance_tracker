<?php
require_once '../auth/session.php';
require_role('judge');
require_once '../includes/db.php';
$participants = $pdo->query("SELECT * FROM participants")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Judge Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <span class="judge-title">🧑‍⚖️ Judge Panel</span>
            <a href="../auth/logout.php" class="btn btn-danger logout-btn" title="Logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </nav>
    <div class="container py-5">
        <div class="mb-4">
            <p class="fs-5 mb-0">Hello, <span class="fw-semibold text-info"><?php echo htmlspecialchars($_SESSION['user']['display_name']); ?></span>!</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-secondary shadow rounded">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-white">Assign Points to Participants</h4>
                        <div class="table-responsive">
                            <table class="table table-dark table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Participant</th>
                                        <th>Assign Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($participants as $participant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($participant['display_name']) ?></td>
                                            <td>
                                                <form action="score_user.php" method="POST" class="d-flex">
                                                    <input type="hidden" name="participant_id" value="<?= $participant['id'] ?>">
                                                    <input type="number" name="points" class="form-control me-2 bg-dark text-white border-secondary" placeholder="Points" required min="1" max="100">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
        }

        .judge-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
        }

        .logout-btn {
            font-weight: 500;
            font-size: 1.1rem;
        }

        .card.bg-secondary {
            background: #343a40 !important;
        }

        .table-dark th,
        .table-dark td {
            vertical-align: middle;
        }
    </style>
</body>

</html>