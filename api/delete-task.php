<?php
$homeURL = "../index.php";
$task_id = htmlspecialchars($_GET["id"]);

require '../db.php';

$sql = "DELETE FROM tasks WHERE id=?";
$sth = $dbh->prepare($sql);
$sth->execute([$task_id]);

header('Location: '.$homeURL);
?>