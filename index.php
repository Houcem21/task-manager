<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet">
    <link href="output.css" rel="stylesheet">
</head>
<body class="relative h-screen">
    <?php
        include 'db.php';
        $tasks;
        try {
            $stmt = $dbh->query("SELECT * FROM tasks");
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            error_log("Database query error: " . $th->getMessage());
            echo "Error loading tasks. Please try again later.";
        };
    ?>
    <ul class="p-10"
        style="display: flex; gap: 20px; flex-flow: row wrap;">
        <?php
            foreach ($tasks as $task) {
                $task_id = htmlspecialchars($task['id']);
                $task_title = htmlspecialchars($task['title']);
                $task_description = htmlspecialchars($task['description']);
                $task_completed = $task['completed'];
                $check = '';
                if($task_completed) {
                    $check = '<div class="w-max absolute bottom-3">✔</div>';
                }
                echo(
                    '<li style="height: 150px; position: relative; width: 150px; display: flex; flex-direction: column; justify-content: center; align-items:center; background-color: grey; padding: 10px;">
                        <h3 class="text-xl">' . $task_title . '</h3>
                        <span style="text-align: center;">' .$task_description . '</span>' .
                         $check .
                        '<a href="edit-task.php?id='.$task_id. '" style="position: absolute; top: 5px; right: 5px; color: white; text-decoration: none;">edit</a>
                        <a href="./api/delete-task.php?id='.$task_id. '" style="position: absolute; top: 5px; left: 5px; color: white; text-decoration: none;">delete</a>
                    </li>'
                );
            }
        ?>
    </ul>
    <div class="create-icon absolute bottom-10 right-10 bg-lime-500 h-15 w-12 rounded-full flex justify-center items-center">
        <a href="./new-task.php" class="text-3xl pb-2 font-bold">+</a>
    </div>

</body>
</html>