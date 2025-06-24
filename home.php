<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet" />
</head>
<body>
    <?php
        include 'db.php';
        $tasks;
        try {
            $stmt = $dbh->query("SELECT * FROM tasks");
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo($th);
        };
    ?>
    <ul style="display: flex; gap: 20px; flex-flow: row wrap; padding:20px">
        <?php
            foreach ($tasks as $task) {
                $task_title = $task['title'];
                $task_description = $task['description'];
                $task_completed = $task['completed'];
                $check = '';
                if($task_completed) { 
                    $check = '<div style="height:15px; width:15px; border-radius: 50%; background-color: green;">✔</div>';
                }
                // just add the variables
                echo(
                    '<li style="height: 100px; width: 100px; display: flex; flex-direction: column; justify-content: center; align-items:center; background-color: grey; padding: 10px;">
                        <h3>' . $task_title . '</h3>
                        <span style="text-align: center;">' .$task_description . '</span>' . 
                         $check .
                    '</li>'
                );
            }
        ?>
    </ul>
</body>
</html>

