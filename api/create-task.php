<?php
    $homeURL = "../index.php";
    include '../db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task_name = htmlspecialchars($_POST["title"]);
        $description = isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : "None";
        $completed = isset($_POST['completed']) ? 1 : 0;

        try {
            $check_sql ="SELECT id FROM tasks WHERE title = ? AND description = ?";
            $check_stmt = $dbh->prepare($check_sql);
            $check_stmt->execute([$task_name, $description]);
            $note = $check_stmt->fetch(PDO::FETCH_ASSOC);

            if (!$note) {
                $sql = "INSERT INTO tasks (title, description, completed) VALUES (?,?,?)";
                $stmt = $dbh->prepare($sql);
                $stmt->execute([$task_name, $description, $completed]);
            }
        } catch (PDOException $e) {
            error_log("Error creating task: " . $e->getMessage());
            header('Location: '.$homeURL.'?error=create_failed');
            exit();
        }
    }

    header('Location: '.$homeURL);
    exit();
?>
