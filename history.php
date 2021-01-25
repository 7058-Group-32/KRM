<?php

require_once ("Models/ApplicationDataSet.php");

$view = new stdClass();
$view->pageTitle = 'History';

session_start();
$applicationData = new applicationDataSet();

// brings the applications from the application data database.
if (isset($_SESSION["loggedin"]))
{
    $view->applicationData = $applicationData->fetchUserApplications($_SESSION["userid"]);
}

// put all the application into alphabetical order.
if (isset($_POST["order"]))
{
    $view->applicationData = $applicationData->fetchSortedUserApplications($_SESSION["userid"]);
}


require_once('Views/history.phtml');
?>