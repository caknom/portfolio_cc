<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connect->prepare('SELECT id, title, date, video, goal, process, outcome FROM project ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link href="css/grid.css" rel="stylesheet">
</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo
  '<p class="project-list">'.$row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'"><br>-- edit --</a>'.
  '<a href="delete_project.php?id='.$row['id'].'"><br>-- delete --</a></p>';
}

$stmt = null;
?>

<br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">Project Title: <br></label>
    <input name="title" type="text" required><br><br>
    <label for="date">Project Date: <br></label>
    <input name="date" type="date" required><br><br>
    <label for="video">Project Video: <br></label>
    <input name="video" type="file" accept="video/mp4" required><br><br>
    <label for="goal">Project Goal: <br></label>
    <textarea name="goal" required></textarea><br><br>
    <label for="process">Project Process: <br></label>
    <textarea name="process" required></textarea><br><br>
    <label for="outcome">Project Outcome: <br></label>
    <textarea name="outcome" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
<br><br>
<a href="logout.php">Logout</a>
<br><br><br><br>
</body>
</html>