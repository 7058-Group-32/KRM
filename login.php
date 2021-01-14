<?php
$view = new stdClass();
$view->pageTitle = 'Login';

$userData= new UserDataSet();
session_start();

if (isset($_POST["login"])) {
    $userPass = htmlentities($_POST['password']);
    $userEmail = htmlentities($_POST['email']);
    $verify = password_verify($userPass, $userData->fetchPassword($userEmail));
    // login button was pressed create a session
    if ($verify==1)
    {
        $_SESSION["loggedin"] = true;
        echo 'logged in';
        //$_SESSION["email"] = $userEmail;
        //echo "logged in";
    }

    else
    {
        //echo "not logged in";
    }
}

if (isset($_POST["logoutButton"])) {
    // logout button was pressed - end the session
    unset($_SESSION["loggedin"]);
    session_destroy();
    $view->loggedin = "not logged in";
}


// actually do something with the page


if (isset($_SESSION["loggedin"])) {
    $view->loggedin = "logged in";
}
require_once('Views/login.phtml');
?>