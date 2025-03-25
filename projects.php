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
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
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
                            <li><hr class="dropdown-divider"></li>
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
                            <tr>
                                <td>1</td>
                                <td>Rice Farming Expansion</td>
                                <td>Agriculture</td>
                                <td>৳100,000</td>
                                <td>12%</td>
                                <td>6 Months</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProjectModal">View</button>
                                    <button class="btn btn-success btn-sm">Approve</button>
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Organic Vegetable Farm</td>
                                <td>Horticulture</td>
                                <td>৳50,000</td>
                                <td>10%</td>
                                <td>4 Months</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProjectModal">View</button>
                                    <button class="btn btn-success btn-sm">Approve</button>
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- View Project Modal -->
            <div class="modal fade" id="viewProjectModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Project Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Project Name:</strong> Rice Farming Expansion</p>
                            <p><strong>Category:</strong> Agriculture</p>
                            <p><strong>Amount Needed:</strong> ৳100,000</p>
                            <p><strong>Expected ROI:</strong> 12%</p>
                            <p><strong>Duration:</strong> 6 Months</p>
                            <p><strong>Description:</strong> This project aims to expand rice farming in rural areas to increase production and profitability.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Approve</button>
                            <button class="btn btn-danger">Reject</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- Container End -->
    </div> <!-- Main Content End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
