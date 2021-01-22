<?php

require_once ("Models/ApplicationDataSet.php");

$view = new stdClass();
$view->pageTitle = 'History';

session_start();
$applicationData = new applicationDataSet();

if (isset($_SESSION["loggedin"]))
{
    $view->applicationData = $applicationData->fetchUserApplications($_SESSION["userid"]);
}

if (isset($_POST["order"]))
{
    $view->applicationData = $applicationData->fetchSortedUserApplications($_SESSION["userid"]);
}


require_once('Views/history.phtml');
?>