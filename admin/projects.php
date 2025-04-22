<?php
include "../db.php";

$db_connection = databaseconnect();

$sql_pending_projects = "SELECT p.id, p.title, p.category, p.target_amount, 
                                p.start_date, p.end_date, p.description, 
                                DATEDIFF(p.end_date, p.start_date) / 30 AS duration 
                        FROM projects p WHERE p.status = 'pending'";
$result_pending_projects = $db_connection->query($sql_pending_projects);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_id = $_POST['project_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $update_sql = "UPDATE projects SET status = 'approved' WHERE id = ?";
    } else if ($action == 'reject') {
        $update_sql = "UPDATE projects SET status = 'rejected' WHERE id = ?";
    }


    $stmt = $db_connection->prepare($update_sql);
    $stmt->bind_param('i', $project_id);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$db_connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects - AgriFinConnect</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #198754;
            padding-top: 20px;
            color: white;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 80px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-leaf me-2"></i> AgriFinConnect Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="users.php"><i class="fas fa-users me-2"></i> Users</a></li>
            <li class="nav-item"><a class="nav-link active" href="projects.php"><i class="fas fa-project-diagram me-2"></i> Projects</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h3 class="mb-4 text-primary"><i class="fas fa-seedling me-2"></i> Manage Projects</h3>

            <!-- Projects Table -->
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Pending Projects</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Category</th>
                                <th>Amount Needed</th>
                                <th>ROI</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($result_pending_projects->num_rows > 0) {
                                while ($project = $result_pending_projects->fetch_assoc()) {
                                    $roi = '15%';
                            ?>
                                    <tr>
                                        <td><?= $project['id'] ?></td>
                                        <td><?= $project['title'] ?></td>
                                        <td><?= $project['category'] ?></td>
                                        <td>৳<?= number_format($project['target_amount'], 2) ?></td>
                                        <td><?= $roi ?></td>
                                        <td><?= $project['duration'] ?> Months</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProjectModal<?= $project['id'] ?>">View</button>
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="project_id" value="<?= $project['id'] ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="project_id" value="<?= $project['id'] ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- View Project Modal -->
                                    <div class="modal fade" id="viewProjectModal<?= $project['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title">Project Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Project Name:</strong> <?= $project['title'] ?></p>
                                                    <p><strong>Category:</strong> <?= $project['category'] ?></p>
                                                    <p><strong>Amount Needed:</strong> ৳<?= number_format($project['target_amount'], 2) ?></p>
                                                    <p><strong>Expected ROI:</strong> <?= $roi ?></p>
                                                    <p><strong>Duration:</strong> <?= $project['duration'] ?> Months</p>
                                                    <p><strong>Description:</strong> <?= $project['description'] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="POST" style="display:inline;">
                                                        <input type="hidden" name="project_id" value="<?= $project['id'] ?>">
                                                        <input type="hidden" name="action" value="approve">
                                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                    <form action="" method="POST" style="display:inline;">
                                                        <input type="hidden" name="project_id" value="<?= $project['id'] ?>">
                                                        <input type="hidden" name="action" value="reject">
                                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                    </form>
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No pending projects</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- Container End -->
    </div> <!-- Main Content End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
