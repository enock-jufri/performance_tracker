<?php
require_once '../auth/session.php';
require_role('admin');
require_once '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
        }

        .admin-title {
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
</head>

<body class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="admin-title">🛡️ Admin Panel</span>
            <a href="../auth/logout.php" class="btn btn-danger logout-btn" title="Logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </nav>
    <div class="container py-4">
        <div class="mb-4">
            <p class="fs-5 mb-0">Welcome, <span class="fw-semibold text-info"><?php echo htmlspecialchars($_SESSION['user']['display_name']); ?></span>!</p>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 col-lg-6">
                <div class="card bg-secondary shadow rounded">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-white">Add New Judge</h4>
                        <form method="POST" action="add_judge.php">
                            <div class="mb-3">
                                <label class="form-label text-white">Judge Username</label>
                                <input type="text" name="username" class="form-control bg-dark text-white border-secondary" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white">Display Name</label>
                                <input type="text" name="display_name" class="form-control bg-dark text-white border-secondary" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white">Password</label>
                                <input type="password" name="password" class="form-control bg-dark text-white border-secondary" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Judge</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Judges List -->
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-secondary shadow rounded">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-white">Current Judges</h4>
                        <div class="table-responsive">
                            <table class="table table-dark table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Display Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $judges = $pdo->query("SELECT username, display_name FROM users WHERE role = 'judge'")->fetchAll();
                                    foreach ($judges as $judge): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($judge['username']) ?></td>
                                            <td><?= htmlspecialchars($judge['display_name']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>