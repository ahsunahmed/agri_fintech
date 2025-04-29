<?php
session_start();
header('Content-Type: application/json');
include "../db.php";
$db_connection = databaseconnect();


$response = ['success' => false, 'error' => ''];


if (isset($_POST['id'])) {
    $user_id = $_POST['id'];
   
    try {
        $stmt = $db_connection->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
       
        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['error'] = "Database error: " . $stmt->error;
        }
       
        $stmt->close();
    } catch (Exception $e) {
        $response['error'] = "Error: " . $e->getMessage();
    }
} else {
    $response['error'] = "No user ID provided";
}


$db_connection->close();
echo json_encode($response);
?>
