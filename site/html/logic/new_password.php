<?php

include '../db_connect.php';

session_start();
if (!(isset($_SESSION['email']))) {
    header("Location: /view/login.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    if (!$token || $token !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit;
    }

    //get user credentials
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    if (!empty($password)) {
        if (isset($file_db)) {
            $sql = $file_db->prepare("UPDATE users SET password=:password WHERE email=:email");
            $sql->bindParam('password', $password);
            $sql->bindParam('email', $email);
            $result = $sql->execute();
        }

    }

    //verify if the user is valid and activ
    header('Location: ../view/inbox.php');

} else {
    echo 'Error: unable to connect to database';
}

