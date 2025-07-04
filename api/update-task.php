<?php
$homeURL = "../index.php";
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = htmlspecialchars($_POST["id"]);
    $new_title = htmlspecialchars($_POST["title"]);
    $new_description = isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : "";
    $new_completed = isset($_POST['completed']) ? 1 : 0;

    try {
        $sql = "UPDATE tasks SET title=?, description=?, completed=? WHERE id=?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$new_title, $new_description, $new_completed, $task_id]);
    } catch (PDOException $e) {
        error_log("Error updating task: " . $e->getMessage());
        header('Location: '.$homeURL.'?error=update_failed');
        exit();
    }
}

header('Location: '.$homeURL);
exit();
?>