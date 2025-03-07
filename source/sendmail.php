<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'portfolio';

    $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();

    $name = mysqli_real_escape_string($connect, $_POST['name']);
    if ($name == NULL) {
        $errors[] = "First name field is empty.";
    }

    $email = $_POST['email'];
    if ($email == NULL) {
        $errors[] = "Email field is empty.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"" . $email . "\" is not a valid email address.";
    }

    $msg = $_POST['msg'];
    if ($email == NULL) {
        $errors[] = "Message is empty.";
    }

    $errcount = count($errors);
    if ($errcount > 0) {
        $errmsg = array();
        for ($i = 0; $i < $errcount; $i++) {
            $errmsg[] = $errors[$i];
        }
        echo json_encode(array("errors" => $errmsg));
    } else {
        $querystring = "INSERT INTO contact_form(id,name,email,message) VALUES(NULL,'" . $name . "','" . $email . "','" . $msg . "')";
        $qpartner = mysqli_query($connect, $querystring);
        echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
    }
?>