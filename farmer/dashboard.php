<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard - AgriFinConnect</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #198754;
            color: white;
            padding-top: 60px;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-seedling me-2"></i> AgriFinConnect Farmer
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Farmer
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-success text-white sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="create_project.php">
                                <i class="fas fa-plus-circle me-2"></i> Create Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="my_projects.php">
                                <i class="fas fa-folder-open me-2"></i> My Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="payments.php">
                                <i class="fas fa-wallet me-2"></i> Payments
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Dashboard Overview</h1>
                    <button class="btn btn-primary">
                        <i class="fas fa-download me-2"></i>Download Report
                    </button>
                </div>

                <!-- Dashboard Stats -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6 class="text-uppercase">Total Projects</h6>
                                    <h2>12</h2>
                                    <small class="text-white-50">+3 this month</small>
                                </div>
                                <i class="fas fa-folder-open fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6 class="text-uppercase">Active Projects</h6>
                                    <h2>8</h2>
                                    <small class="text-white-50">↑ 20% this month</small>
                                </div>
                                <i class="fas fa-play-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6 class="text-uppercase">Pending Investments</h6>
                                    <h2>৳50,000</h2>
                                    <small class="text-white-50">Pending Approvals</small>
                                </div>
                                <i class="fas fa-hourglass-half fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-danger text-white h-100">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6 class="text-uppercase">Total Earnings</h6>
                                    <h2>৳1.5M</h2>
                                    <small class="text-white-50">+10% this month</small>
                                </div>
                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Projects -->
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Recent Projects</h5>
                        <a href="my_projects.php" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Investment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Organic Farming</td>
                                <td>৳20,000</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>Greenhouse Vegetables</td>
                                <td>৳15,000</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Fish Farming</td>
                                <td>৳30,000</td>
                                <td><span class="badge bg-info">New</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
