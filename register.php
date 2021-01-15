<?php
require_once('Models/UserDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Homepage';

session_start();
$userData = new UserDataSet();

$view->register="";

if(isset($_POST['register']))
{
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $number = htmlentities($_POST['number']);
    $address1 = htmlentities($_POST['address1']);
    $address2 = htmlentities($_POST['address2']);
    $postcode = htmlentities($_POST['postcode']);
    $password1 = htmlentities($_POST['password1']);
    $password2 = htmlentities($_POST['password2']);

    $address = $address1 . ', ' . $address2 . ', ' . $postcode;

    $unique=$userData->uniqueEmailCheck($email);

    $password = null;
    $encryptedPass = null;
    if ($password1 == $password2)
    {
        $password = $password1;
        $encryptedPass= password_hash($password1,PASSWORD_DEFAULT);
        $userData->register($name, $email, $number, $address, $encryptedPass);

        $_SESSION["registered"] = true;
    }


    else{

        if ($unique ==true)
        {
            $view->register = "Oops! An account has already been made using this email!";

        }

        else
        {
            $view->register = "Oops! Your passwords do not match!";
        }
    }






}

require_once('Views/register.phtml');
?>