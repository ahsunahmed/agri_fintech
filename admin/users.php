<?php
session_start();
include "../db.php";
$db_connection = databaseconnect();


if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}


// Fetch all users with required fields
$sql_users = "SELECT id, full_name, email, role, created_at FROM users ORDER BY created_at DESC";
$result_users = $db_connection->query($sql_users);


$count_farmers = $db_connection->query("SELECT COUNT(*) FROM users WHERE role = 'farmer'")->fetch_row()[0];
$count_investors = $db_connection->query("SELECT COUNT(*) FROM users WHERE role = 'investor'")->fetch_row()[0];
$count_total = $db_connection->query("SELECT COUNT(*) FROM users")->fetch_row()[0];


$db_connection->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - AgriFinConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .nav-link {
            color: white;
        }
        .nav-link.active {
            background-color: #007bff;
            border-radius: 5px;
        }
        .stat-card {
            border-radius: 10px;
            color: white;
        }
        .main-content {
            padding: 20px;
        }
        .badge-success {
            background-color: #28a745;
        }
        .badge-primary {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 sidebar">
                <div class="p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="users.php">
                                <i class="fas fa-users me-2"></i> Users
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="projects.php">
                                <i class="fas fa-project-diagram me-2"></i> Projects
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 main-content">
                <?php if (isset($message)): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= $message ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
               
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>


                <h2 class="mb-4">User Management</h2>


                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card bg-primary">
                            <div class="card-body">
                                <h6>Total Users</h6>
                                <h3><?= $count_total ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card bg-success">
                            <div class="card-body">
                                <h6>Farmers</h6>
                                <h3><?= $count_farmers ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card bg-info">
                            <div class="card-body">
                                <h6>Investors</h6>
                                <h3><?= $count_investors ?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Users Table -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Joined Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($user = $result_users->fetch_assoc()): ?>
                                    <tr id="user-row-<?= $user['id'] ?>">
                                        <td><?= htmlspecialchars($user['full_name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td>
                                            <span class="badge <?= $user['role'] === 'farmer' ? 'badge-success' : 'badge-primary' ?>">
                                                <?= ucfirst($user['role']) ?>
                                            </span>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <form method="POST" action="delete_user.php" class="delete-form" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // AJAX deletion with confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
           
            if (confirm('Are you sure you want to delete this user?')) {
                const formData = new FormData(this);
                const userId = formData.get('id');
               
                fetch('delete_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        document.getElementById('user-row-' + userId).remove();
                       
                        // Show success message
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-success alert-dismissible fade show';
                        alert.innerHTML = `
                            User deleted successfully
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        `;
                        document.querySelector('.main-content').prepend(alert);
                    } else {
                        alert('Error: ' + (data.error || 'Failed to delete user'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the user');
                });
            }
        });
    });
    </script>
</body>
</html>
