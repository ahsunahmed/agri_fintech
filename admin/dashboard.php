<?php
include "../db.php"; 
$db_connection = databaseconnect();

// Total Farmers
$sql_farmers = "SELECT COUNT(*) AS total_farmers FROM users WHERE role = 'farmer'";
$result_farmers = $db_connection->query($sql_farmers);
$row_farmers = $result_farmers->fetch_assoc();
$total_farmers = $row_farmers['total_farmers'];

// Total Investors
$sql_investors = "SELECT COUNT(*) AS total_investors FROM users WHERE role = 'investor'";
$result_investors = $db_connection->query($sql_investors);
$row_investors = $result_investors->fetch_assoc();
$total_investors = $row_investors['total_investors'];

// Active Projects
$sql_projects = "SELECT COUNT(*) AS active_projects FROM projects WHERE status = 'approved'";
$result_projects = $db_connection->query($sql_projects);
$row_projects = $result_projects->fetch_assoc();
$active_projects = $row_projects['active_projects'];

// Total Investment
$sql_investment = "SELECT SUM(target_amount) AS total_investment FROM projects WHERE status = 'approved'";
$result_investment = $db_connection->query($sql_investment);
$row_investment = $result_investment->fetch_assoc();
$total_investment = $row_investment['total_investment'];

// Fetch Recent Projects
$sql_recent_projects = "SELECT p.title, u.full_name AS farmer, p.target_amount AS amount, p.status
                        FROM projects p
                        JOIN users u ON p.farmer_id = u.id
                        ORDER BY p.start_date DESC LIMIT 3";
$result_recent_projects = $db_connection->query($sql_recent_projects);

// Fetch Recent Users
$sql_recent_users = "SELECT full_name, role, created_at FROM users ORDER BY created_at DESC LIMIT 3";
$result_recent_users = $db_connection->query($sql_recent_users);

$db_connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AgriFinConnect</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>
                AgriFinConnect Admin
            </a>
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
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="projects.php">
                    <i class="fas fa-project-diagram"></i>
                    Projects
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Dashboard Overview</h1>
            <button class="btn btn-primary">
                <i class="fas fa-download me-2"></i>Download Report
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <!-- Total Farmers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-2">Total Farmers</h6>
                                <h2 class="mb-0"><?= $total_farmers ?></h2>
                                <small class="text-white-50">↑ 12% this month</small>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Investors -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-2">Total Investors</h6>
                                <h2 class="mb-0"><?= $total_investors ?></h2>
                                <small class="text-white-50">↑ 8% this month</small>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Projects -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-2">Active Projects</h6>
                                <h2 class="mb-0"><?= $active_projects ?></h2>
                                <small class="text-white-50">↑ 15% this month</small>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-project-diagram fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Investment -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card bg-danger text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-2">Total Investment</h6>
                                <h2 class="mb-0">৳<?= number_format($total_investment, 2) ?></h2>
                                <small class="text-white-50">↑ 20% this month</small>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="row">
            <!-- Recent Projects -->
            <div class="col-xl-6 mb-4">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Recent Projects</h5>
                        <a href="projects.php" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Farmer</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($project = $result_recent_projects->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $project['title'] ?></td>
                                    <td><?= $project['farmer'] ?></td>
                                    <td>৳<?= number_format($project['amount'], 2) ?></td>
                                    <td><span class="badge bg-<?= strtolower($project['status']) ?>"><?= ucfirst($project['status']) ?></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="col-xl-6 mb-4">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Recent Users</h5>
                        <a href="users.php" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Joined</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($user = $result_recent_users->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $user['full_name'] ?></td>
                                    <td><?= ucfirst($user['role']) ?></td>
                                    <td><?= $user['created_at'] ?></td>
                                    <td><span class="badge bg-<?= strtolower($user['role']) ?>"><?= ucfirst($user['role']) ?></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
