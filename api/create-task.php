<?php
    // Set up form values
    $homeURL = "../index.php";
    $task_name = htmlspecialchars($_POST["title"]);
    $description = "None";
    $completed = false;

    if (array_key_exists('completed', $_POST)) {
        $completed = true;
    }
    if (array_key_exists('description', $_POST)) {
        $description = htmlspecialchars($_POST["description"]);;
    }
    echo('You have to ' . $task_name . '!<br />' . $description . $completed. '<br />');
    
    // Connect to db
    include '../db.php';
    
    try {
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $check_sql ="SELECT * FROM tasks WHERE title like ? AND description like ?";
        $check_stmt = $dbh->prepare($check_sql);
        $check_stmt->execute([$task_name,$description]);
        $note = $check_stmt->fetch();
        if ($note) {
            echo('yup already there');
        }
        else {
            echo('nah were good'); 
            $sql = "INSERT INTO tasks (title, description, completed) VALUES (?,?,?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$task_name,$description,$completed]);
            echo("New Record added");
        }; 
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();;
    }

    //close off
    $dbh= null;
    
header('Location: '.$homeURL);
?>
