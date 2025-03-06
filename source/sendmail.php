<?php

require_once('includes/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$errors = [];

$name = trim($name);
$email = trim($email);
$msg = trim($msg);

if(empty($name)) {
    $errors['name'] = 'Please, enter your name';
}
if(empty($msg)) {
    $errors['comments'] = 'Don\'t forget to leave a message';
}
if(empty($email)) {
    $errors['email'] = 'An email is required to contact you';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'I need a valid email address to contact you';
}

if(empty($errors)) {

    $query = "INSERT INTO contact_form (name, email, message) VALUES(:name, :email, :message)";

    $stmt = $connect->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $msg);


    if ($stmt->execute()) {
        $to = 'caknom@gmail.com';
        $subject = 'New Message from my Site';
        $message = "Name: " . $name . "\n";
        $message .= "Email: " . $email . "\n";
        $message .= "Message: " . $msg . "\n";

        mail($to, $subject, $message);

        $_SESSION['message_sent'] = true;
        header('Location: thank_you.php');
        exit();
    } else {
        echo 'I\'m sorry, there was a problem. Please try again.';
    }

    $stmt->close();
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}

$connect = null;

?>