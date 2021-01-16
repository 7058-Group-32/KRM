<?php
require_once('Models/UserDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Homepage';

//session_start();
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

    $password = null;
    $encryptedPass = null;
    if ($password1 == $password2)
    {
        $password = $password1;

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $view->register = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

        }
        else {
            $encryptedPass= password_hash($password1,PASSWORD_DEFAULT);
            $userData->register($name, $email, $number, $address, $encryptedPass);

            $_SESSION["registered"] = true;
        }
    }

    else {
        $view->register = "Oops! Your passwords do not match!";
    }







}

require_once('Views/register.phtml');
?>