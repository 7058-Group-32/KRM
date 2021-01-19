<?php
$view = new stdClass();
$view->pageTitle = 'Profile';

require_once('Models/UserDataSet.php');


$userData = new UserDataSet();

$id = $_SESSION["userid"];
$view->name = $_SESSION["na"];
$view->email = $_SESSION["em"];
$view->phone = $_SESSION["pho"];
$view->address = $_SESSION["add"];

if(isset($_POST['delete']))
{
    $userData->deleteUser($id);
    $_SESSION["deleted"] = true;
}

if(isset($_POST['save']))
{

    $newName = htmlentities($_POST['userInfo-name']);
    $newEmail = htmlentities($_POST['userInfo-email']);
    $newNumber = htmlentities($_POST['userInfo-phone']);
    $newAddress1 = htmlentities($_POST['userInfo-ad1']);
    $newAddress2 = htmlentities($_POST['userInfo-ad2']);
    $newPostcode = htmlentities($_POST['userInfo-postcode']);
    $oldPassword = htmlentities($_POST['userInfo-old-pass']);
    $newPassword1 = htmlentities($_POST['userInfo-pass1']);
    $newPassword2 = htmlentities($_POST['userInfo-pass2']);

    if ($newName != null)
    {
        $userData->changeName($id, $newName);
        $_SESSION["na"] = $newName;
    }

    if ($newEmail != null)
    {
        $userData->changeEmail($id, $newEmail);
        $_SESSION["em"] = $newEmail;
    }

    $_SESSION["saved"] = true;
}



require_once('Views/profile.phtml');
?>