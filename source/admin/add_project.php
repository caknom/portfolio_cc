<?php
require_once('../includes/connect.php');

if (isset($_POST['submit'])) {
    $random = rand(100000, 999999);
    $newname = 'video' . $random;
    $filetype = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));

    if ($filetype != 'mp4') {
        exit('Sorry, only MP4 files are allowed.');
    }

    $newname .= '.' . $filetype;
    $target_file = '../videos/' . $newname;

    if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
        $query = "INSERT INTO project (title, date, video, goal, process, outcome) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['date'], PDO::PARAM_STR);
        $stmt->bindParam(3, $newname, PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['goal'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['process'], PDO::PARAM_STR);
        $stmt->bindParam(6, $_POST['outcome'], PDO::PARAM_STR);
        $stmt->execute();

        $lastid = $connect->lastInsertId();

        header('Location: project_list.php');
        exit();
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }
}
?>