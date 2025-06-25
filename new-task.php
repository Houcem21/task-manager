<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet" />
    <link href="output.css" rel="stylesheet">
</head>
<body>
    <form action="./api/create-task.php" method="post" class="w-[100vw] h-[100vh] flex flex-col gap-5 justify-center text-center items-center">
        <label for="title">
            Title
            <br />
            <input required type="text" id="title" name="title" style="margin-bottom: 20px;" />
        </label>
        <label for="description">
            Description
            <br />
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