<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Projects - AgriFinConnect</title>

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
            background-color: #0d6efd;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-chart-line me-2"></i> AgriFinConnect Investor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Investor
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

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-home me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="my_investments.php"><i class="fas fa-money-bill-wave me-2"></i> My Investments</a></li>
            <li class="nav-item"><a class="nav-link active" href="browse_projects.php"><i class="fas fa-seedling me-2"></i> Browse Projects</a></li>
            <li class="nav-item"><a class="nav-link" href="transactions.php"><i class="fas fa-receipt me-2"></i> Transactions</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-primary">Available Projects</h3>
                <input type="text" class="form-control w-25" placeholder="Search Projects">
            </div>

            <!-- Projects List -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">Rice Farming Expansion</div>
                        <div class="card-body">
                            <p><strong>Category:</strong> Agriculture</p>
                            <p><strong>Amount Needed:</strong> ৳100,000</p>
                            <p><strong>Expected ROI:</strong> 12%</p>
                            <p><strong>Duration:</strong> 6 Months</p>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProjectModal">View Details</button>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#investModal">Invest</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">Organic Vegetable Farm</div>
                        <div class="card-body">
                            <p><strong>Category:</strong> Horticulture</p>
                            <p><strong>Amount Needed:</strong> ৳50,000</p>
                            <p><strong>Expected ROI:</strong> 10%</p>
                            <p><strong>Duration:</strong> 4 Months</p>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProjectModal">View Details</button>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#investModal">Invest</button>
                        </div>
                    </div>
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
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#investModal">Invest Now</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invest Modal -->
            <div class="modal fade" id="investModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title">Invest in Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Project:</strong> Rice Farming Expansion</p>
                            <p><strong>Amount Needed:</strong> ৳100,000</p>
                            <label>Investment Amount:</label>
                            <input type="number" class="form-control" placeholder="Enter amount">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Confirm Investment</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
