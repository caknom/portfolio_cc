<?php
require_once('../includes/connect.php');
$query = "UPDATE project SET title = ?, date = ?, video = ?, goal = ?, process = ?, outcome = ? WHERE id = ?";

$stmt = $connect->prepare($query);

$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['date'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['video'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['goal'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['process'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['outcome'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: project_list.php');
?>