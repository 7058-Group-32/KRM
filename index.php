<?php

$view = new stdClass();
$view->pageTitle = 'Homepage';
require_once('Views/index.phtml');

echo '1';


if(!isset($_POST['project-name'])){$_POST['project-name'] = '';}

if(!isset($_POST['customer-name'])){$_POST['customer-name'] = '';}

if(!isset($_POST['deadline'])){$_POST['deadline'] = '';}

if(!isset($_POST['email'])){$_POST['email'] = '';}

if(!isset($_POST['budget-range'])){$_POST['budget-range'] = '';}

if(!isset($_POST['short-description'])){$_POST['short-description'] = '';}

$projectName = $_POST['project-name'];
$customerName = $_POST['customer-name'];
$deadline = $_POST['deadline'];
$email = $_POST['email'];
$budgetRange = $_POST['budget-range'];
$shortDescription = $_POST['short-description'];


//if all of the information has been set, then you can send the mail
if (isset($_POST['submit']) || $_POST['project-name'] || $_POST['customer-name'] || $_POST['deadline'] || $_POST['email'] || $_POST['budget-range'] || $_POST['short-description'])
{
    echo 'Message was sent2';

    //Recipient of the email
    $to = 'l.whiteley1@edu.salford.ac.uk';

    //Subject of the email
    $subject = $projectName;

    //The body of the message
    $message = '<p><b>'. $projectName .'</b></p> <p>'.$customerName.'</p> <p>'. $deadline . '</p> <p>'. $budgetRange .'<p>'. $shortDescription .'</p>';

    //Headers of the message
    $headers = "From: " . $customerName . "<".$email.">\r\n";
    $headers .=  "Reply-To: " . $customerName . "<".$email.">\r\n";
    $headers .="Content-type: text/html\r\n";

    //Sends the mail
    mail($to,$subject,$message, $headers);

    echo 'Message was sent3';
}else{
    echo 'Not all fields are complete';
}
