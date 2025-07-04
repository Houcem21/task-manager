<?php
// db.php - Database connection configuration using PDO

// In Docker Compose, service names (like 'db') are used as hostnames
// The 'db' service is running MySQL
$host = 'db'; // The name of the database service in docker-compose.yml
$db_name = 'task-manager'; // Matches your application's database name
$user = 'crud_user'; // Matches MYSQL_USER in docker-compose.yml
$password = 'root'; // Matches MYSQL_PASSWORD in docker-compose.yml

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $user, $password);
    // Set the PDO error mode to exception for better error reporting
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the 'tasks' table if it doesn't exist
    // This ensures your application has the necessary table when it starts in Docker
    $sql = "CREATE TABLE IF NOT EXISTS tasks (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        completed BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $dbh->exec($sql);

} catch (PDOException $e) {
    // Log the error and terminate script gracefully
    error_log("Database Connection Failed: " . $e->getMessage());
    // In a production environment, you might want a more sophisticated retry logic
    // For development, simply dying here is often sufficient to highlight the issue.
    die("Database connection failed. Please try again later.");
}
?>