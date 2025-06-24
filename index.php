<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet" />
</head>
<body>
    <form action="create-task.php" method="post">
        <label for="title">
            Title
            <input required type="text" id="title" name="title" style="margin-bottom: 20px;" />
        </label>
        <br />
        <label for="description">
            Description
            <textarea id="description" name="description" rows="5" cols="20" ></textarea>
        </label>

        <label for="completed">
            Done
            <input type="checkbox" name="completed" id="completed" value="1" />
        </label>
        <button type="submit">Add</button>
    </form>
</body>
</html>