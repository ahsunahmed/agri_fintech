<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects - AgriFinConnect</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar full height */
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
        .sidebar .nav-link {
            color: white;
            padding: 10px;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        @media (max-width: 992px) {
            .sidebar {
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
            <a class="navbar-brand" href="#"><i class="fas fa-seedling me-2"></i> AgriFinConnect Farmer</a>
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

    <!-- Sidebar -->
    <div class="sidebar col-md-3 col-lg-2 d-md-block">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="create_project.php"><i class="fas fa-plus-circle me-2"></i> Create Project</a></li>
                <li class="nav-item"><a class="nav-link active" href="my_project.php"><i class="fas fa-folder-open me-2"></i> My Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="payments.php"><i class="fas fa-wallet me-2"></i> Payments</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="h3 mb-4">My Projects</h1>

        <!-- Projects Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Investment (৳)</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Organic Farming</td>
                        <td>20,000</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Project Name:</strong> Organic Farming</p>
                    <p><strong>Investment:</strong> ৳20,000</p>
                    <p><strong>Status:</strong> Active</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" value="Organic Farming">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Investment (৳)</label>
                            <input type="number" class="form-control" value="20000">
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
