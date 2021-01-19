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
    $userData->deleteUser($id);
    $_SESSION["deleted"] = true;
}



require_once('Views/profile.phtml');
?>