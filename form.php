<?php
$view = new stdClass();
$view->pageTitle = 'Application';
require_once('Views/form.phtml');
require_once('Models/ApplicationDataSet.php');

//note could be reworked to make the site faster
if(!isset($_POST['project-name'])){$_POST['project-name'] = '';}
if(!isset($_POST['customer-name'])){$_POST['customer-name'] = '';}
if(!isset($_POST['deadline'])){$_POST['deadline'] = '';}
if(!isset($_POST['email'])){$_POST['email'] = '';}
if(!isset($_POST['budget-range'])){$_POST['budget-range'] = '';}
if(!isset($_POST['short-description'])){$_POST['short-description'] = '';}
if(!isset($_POST['other-requirement'])){$_POST['other-requirement'] = '';}

$projectName = $_POST['project-name'];
$customerName = $_POST['customer-name'];
$deadline = $_POST['deadline'];
$email = $_POST['email'];
$budgetRange = $_POST['budget-range'];
$shortDescription = $_POST['short-description'];
$otherReq = $_POST['other-requirement'];

//if all of the information has been set, then you can send the mail
if (isset($_POST['submit']) || $_POST['project-name'] || $_POST['customer-name'] || $_POST['deadline'] || $_POST['email'] || $_POST['budget-range'] || $_POST['short-description'])
{


    //Recipient of the email
    $to = 'l.whiteley1@edu.salford.ac.uk';

    //Subject of the email
    $subject = $projectName;

    //The body of the message
    $message = '<p><b>'. $projectName .'</b></p> <p>'.$customerName.'</p> <p>'. $deadline . '</p> <p>'. $budgetRange .'<p>'. $shortDescription .'</p>' . $otherReq . '</p>';

    //Headers of the message
    $headers = "From: " . $customerName . "<".$email.">\r\n";
    $headers .=  "Reply-To: " . $customerName . "<".$email.">\r\n";
    $headers .="Content-type: text/html\r\n";

    //Sends the mail
    mail($to,$subject,$message, $headers);
    
    //min and max have been given the placeholder value of budgetRange
    //no way to get userID currently
    addApplication($projectName, $customerName, $shortDescription, $budgetRange, $budgetRange, $deadline, $otherReq, $userID);

}else{
    echo 'Not all fields are complete';
}
