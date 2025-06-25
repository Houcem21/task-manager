<?php
$homeURL = "../index.php";
$task_id = htmlspecialchars($_POST["id"]);
$new_title = htmlspecialchars($_POST["title"]);
$new_description = "";
$new_completed = 0;
if (array_key_exists('completed', $_POST)) {
    $new_completed = true;
}
if (array_key_exists('description', $_POST)) {
    $new_description = htmlspecialchars($_POST["description"]);;
}

require '../db.php';

$sql = "UPDATE tasks SET title=?, description=?, completed=? WHERE id=?";
$sth = $dbh->prepare($sql);
$sth->execute([$new_title, $new_description, $new_completed, $task_id]);

header('Location: '.$homeURL);
echo $task_id . $new_title. $new_description . $new_completed;
?>