<?php
    // Connect to db
    include '../db.php';
    try {
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->query("SELECT * FROM tasks");
        header('Content-Type: application/json');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($tasks);     
    } catch (PDOException $e) {
        echo $sql . "<br/>" . $e->getMessage();;
    }

    //close off
    $dbh= null;
?>