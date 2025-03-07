<?php
require_once('../includes/connect.php');

$random = rand(100000,999999);
$newname = 'image'.$random;

$filetype = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

if($filetype == 'jpeg') {
  $filetype = 'jpg';
}

if($filetype == 'exe') {
  exit('nice try');
}

$newname .= '.'.$filetype;
$target_file = '../images/'.$newname;

move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file) {

$query = "INSERT INTO project (title,date,video,goal,process,outcome) VALUES (?,?,?,?,?,?)";
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['date'], PDO::PARAM_STR);
$stmt->bindParam(3, $newname, PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['goal'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['process'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['outcome'], PDO::PARAM_STR);
$stmt->execute();

$lastid = $connection->lastInsertId();

header('Location: project_list.php');
}

if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['uploaded']['tmp_name']);
    if($check !== false) {
        echo 'File is an image - ' . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo 'Sorry, file already exists.';
    $uploadOk = 0;
}

if ($_FILES['uploaded']['size'] > 500000) {
    echo 'Sorry, your file is too large.';
    $uploadOk = 0;
}

if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadOk = 0;
}else{
}

if ($uploadOk == 0) {
    echo 'Sorry, your file was not uploaded.';
    
} else {
if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file)) {
            echo 'The file '.$target_file.' has been uploaded.';
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
*/
?>