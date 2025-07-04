<?php
header('Content-Type: application/json');
include '../db.php';

try {
    $stmt = $dbh->query("SELECT * FROM tasks ORDER BY created_at DESC");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tasks);
} catch (PDOException $e) {
    error_log("Error fetching tasks: " . $e->getMessage());
    echo json_encode(["error" => "Failed to fetch tasks."]);
}
?>