<?php
$homeURL = "../index.php";
$task_id = htmlspecialchars($_GET["id"]);

require '../db.php';

try {
    $sql = "DELETE FROM tasks WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$task_id]);
} catch (PDOException $e) {
    error_log("Error deleting task: " . $e->getMessage());
    header('Location: '.$homeURL.'?error=delete_failed');
    exit();
}

header('Location: '.$homeURL);
exit();
?>