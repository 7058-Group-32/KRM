<?php
require_once('Models/UserDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Login';


$userData= new UserDataSet();
session_start();

$view->loggedin = "";

unset($_SESSION["registered"]);

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
        $view->loggedin = "Oops! Email or password is incorrect!";
        //echo "not logged in";
    }
}

if (isset($_POST["logout"])) {
    // logout button was pressed - end the session
    unset($_SESSION["loggedin"]);
    session_destroy();

}


// actually do something with the page


if (isset($_SESSION["loggedin"])) {
    $view->loggedin = "logged in";
}
require_once('Views/login.phtml');
?>