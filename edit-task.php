<?php
    require 'db.php';
    $task_id = htmlspecialchars($_GET["id"]);
    $sql = "SELECT title, description, completed FROM tasks WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$task_id]);
    $info = $sth->fetch();
    $title = $info["title"];
    $description = $info["description"];
    $completed = $info["completed"];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="output.css" rel="stylesheet">
</head>
<body>
    <form action="./api/update-task.php" method="post" class="w-[100vw] h-[100vh] flex flex-col gap-5 justify-center items-center">
        <label for="title" class="text-xl">
            Title
            <input required type="text" value="<?php echo $title?>"
            id="title" name="title" style="margin-bottom: 20px;" />
        </label>
        <label for="description">
            Description
            <textarea 
                id="description" name="description" 
                rows="5" ><?php echo $description?></textarea>
        </label>
        <label for="completed">
            Done
            <input type="checkbox" name="completed" id="completed" <?php if($completed) echo "checked" ?> />
        </label>
        <label for="id">
            <input type="hidden" name="id" value="<?php echo $task_id?>" />
        </label>
        <button type="submit">Update</button>
    </form>
</body>
</html>