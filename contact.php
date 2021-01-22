<?php

$view = new stdClass();
$view->pageTitle = 'Contact';

session_start();

//Initialises all of the post variables
if(!isset($_POST['contact-name'])){$_POST['contact-name'] = '';}
if(!isset($_POST['contact-phone'])){$_POST['contact-phone'] = '';}
if(!isset($_POST['contact-email'])){$_POST['contact-email'] = '';}
if(!isset($_POST['contact-subject'])){$_POST['contact-subject'] = '';}
if(!isset($_POST['contact-topic'])){$_POST['contact-topic'] = '';}
if(!isset($_POST['contact-message'])){$_POST['contact-message'] = '';}

//Sets all of the post variables to variables
$contactName = $_POST['contact-name'];
$contactPhone = $_POST['contact-phone'];
$contactEmail = $_POST['contact-email'];
$contactSubject = $_POST['contact-subject'];
$contactTopic = $_POST['contact-topic'];
$contactMessage = $_POST['contact-message'];

//Sets confirmation message to null
$view->message = null;


//print_r($_POST);


//Auto sets the email if the user is logged in
/*if(isset($_SESSION["loggedin"]))
{
    $contactEmail = htmlentities($_SESSION["em"]);
}*/

//Sends the email
if(isset($_POST['submit'])){

    //Recipient of the email
    $to = 'l.whiteley1@edu.salford.ac.uk';

    //Sets the Subject of the email
    $subject = $contactSubject;

    //The body of the message
    $message = '<p><b> Subject:'. $contactSubject .'</b></p> <p> <b>Contact Information:</b>  </p>  <p> Customer Name:'.$contactName.'</p> <p> Phone: '. $contactPhone . '</p> <p> Email: '. $contactEmail .'</p> <p> Topic: '. $contactTopic .'</p> <p> Message: ' . $contactMessage . '</p>';

    //Headers of the message
    $headers = "From: " . $contactName . "<".$contactEmail.">\r\n";
    $headers .=  "Reply-To: " . $contactName . "<".$contactEmail.">\r\n";
    $headers .="Content-type: text/html\r\n";

    //Sends the mail
    mail($to,$subject,$message, $headers);
    
    //Outputs a message so the user knows their email has been sent
    $view->message = '<div class="text-block">Thank you, your submission has been received!</div>';
    
}


require_once('Views/contact.phtml');

