<?php
require_once('../includes/connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $connect->prepare('SELECT * FROM project WHERE id = ?');
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $video = $_POST['video'];
    $goal = $_POST['goal'];
    $process = $_POST['process'];
    $outcome = $_POST['outcome'];

    $query = "UPDATE project SET title = ?, date = ?, video = ?, goal = ?, process = ?, outcome = ? WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(1, $title, PDO::PARAM_STR);
    $stmt->bindParam(2, $date, PDO::PARAM_STR);
    $stmt->bindParam(3, $video, PDO::PARAM_STR);
    $stmt->bindParam(4, $goal, PDO::PARAM_STR);
    $stmt->bindParam(5, $process, PDO::PARAM_STR);
    $stmt->bindParam(6, $outcome, PDO::PARAM_STR);
    $stmt->bindParam(7, $id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: project_list.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
<h3>Edit Project</h3>
<form action="edit_project.php" method="post">
    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
    <label for="title">Project Title: </label>
    <input name="title" type="text" value="<?php echo $project['title']; ?>" required><br><br>
    <label for="date">Project Date: </label>
    <input name="date" type="date" value="<?php echo $project['date']; ?>" required><br><br>
    <label for="video">Project Video: </label>
    <input name="video" type="text" value="<?php echo $project['video']; ?>" required><br><br>
    <label for="goal">Project Goal: </label>
    <textarea name="goal" required><?php echo $project['goal']; ?></textarea><br><br>
    <label for="process">Project Process: </label>
    <textarea name="process" required><?php echo $project['process']; ?></textarea><br><br>
    <label for="outcome">Project Outcome: </label>
    <textarea name="outcome" required><?php echo $project['outcome']; ?></textarea><br><br>
    <input name="submit" type="submit" value="Update">
</form>
<br><br><br>
<a href="project_list.php">Back to Project List</a>
</body>
</html>