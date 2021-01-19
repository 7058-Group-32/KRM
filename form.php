<?php
$view = new stdClass();
$view->pageTitle = 'Application';

require_once('Models/ApplicationDataSet.php');
require_once('Models/UserDataSet.php');

//session_start();

$userDataSet = new UserDataSet();
$applicationData = new ApplicationDataSet();
//$view->userDataSet = $userDataSet->fetchUser(3);
//$e = $_SESSION["e"];
//echo $e;

//Initialises all of the post variables
if(!isset($_POST['project-name'])){$_POST['project-name'] = '';}
if(!isset($_POST['customer-name'])){$_POST['customer-name'] = '';}
if(!isset($_POST['deadline'])){$_POST['deadline'] = '';}
if(!isset($_POST['email'])){$_POST['email'] = '';}
if(!isset($_POST['min-budget-range'])){$_POST['min-budget-range'] = '';}
if(!isset($_POST['max-budget-range'])){$_POST['max-budget-range'] = '';}
if(!isset($_POST['short-description'])){$_POST['short-description'] = '';}
if(!isset($_POST['other-requirement'])){$_POST['other-requirement'] = '';}

//initialise address & number
if(!isset($_POST['number'])){$_POST['number'] = '';}
if(!isset($_POST['address1'])){$_POST['address1'] = '';}
if(!isset($_POST['address2'])){$_POST['address2'] = '';}
if(!isset($_POST['postcode'])){$_POST['postcode'] = '';}


$projectName = $_POST['project-name'];

$deadline = $_POST['deadline'];

$shortDescription = $_POST['short-description'];
$otherReq = $_POST['other-requirement'];
$minBudgetRange = $_POST['min-budget-range'];
$maxBudgetRange = $_POST['max-budget-range'];

if(isset($_SESSION["loggedin"]))
{
    //$number = htmlentities($_POST['number']);
    $id1 = htmlentities($_SESSION["userid"]);
    $id = (int)$id1;
    $userDataSet->fetchUser($id);
    $customerName =  htmlentities($_SESSION["na"]);
    $email = htmlentities($_SESSION["em"]);
    $address = htmlentities($_SESSION["add"]);
    $number = htmlentities($_SESSION["pho"]);
}

else {
    $id = 13;
    
    $customerName = htmlentities($_POST['customer-name']);
    $email = htmlentities($_POST['email']);
    $number = htmlentities($_POST['number']);
    $address1 = htmlentities($_POST['address1']);
    $address2 = htmlentities($_POST['address2']);
    $postcode = htmlentities($_POST['postcode']);
}



//if all of the information has been set, then you can send the mail
if (isset($_POST['submit']) || $_POST['project-name'] || $_POST['deadline'] || $_POST['email'] || $_POST['min-budget-range'] || $_POST['max-budget-range'] || $_POST['short-description'])
{
    //If the description contains an apostrophe, it's replaced by an escaped apostrophe
    /*if(str_contains($shortDescription,"'")){
        str_replace("'","\'",$shortDescription);
    }

    //If the description contains a speech mark, it's replaced by an escaped speech mark
    if(str_contains($shortDescription,'"')){
        str_replace('"','\"',$shortDescription);
    }*/
    
    //Recipient of the email
    $to = 'l.whiteley1@edu.salford.ac.uk';
    
   //Checking deadline is valid
    if(isset($deadline))
    {
        //First checks that the deadline contains a "-"
        if (str_contains($deadline, '-')) {
            $expDeadline = explode("-",$deadline);
            //Then checks that the date is a real date
            if(checkdate((int) $expDeadline[1],(int) $expDeadline[2],(int) $expDeadline[0]) == true ){
                //Then checks that the minbudget and maxbudget are valid
                if(is_numeric($minBudgetRange) && is_numeric($maxBudgetRange) && $maxBudgetRange > $minBudgetRange){
                    //Message to say that the submission has been submitted
                    echo '<div class="section"> <h3 class="heading-3" >Thank you, your submission has been received!</h3> </div>';
                    //added to the database
                    $applicationData->addApplication($projectName, $shortDescription, $minBudgetRange, $maxBudgetRange, $deadline, $otherReq, $id);

                    //Subject of the email
                    $subject = $projectName;

                    //The body of the message
                    $message = '<p><b> Project Name:'. $projectName .'</b></p> <p> Customer Name:'.$customerName.'</p> <p> Deadline: '. $deadline . '</p> <p> Budget Range: '. $minBudgetRange . ' - '. $maxBudgetRange .'</p> <p> Short Description: '. $shortDescription .'</p> <p> Other Requirements: ' . $otherReq . '</p> <p> <b>Contact Information: </b></p> Customer Name: <p>'. $customerName.'</p> <p> Email: '. $email . '</p> <p> Phone Number: '. $number . '</p> <p> Email: '. $email . '</p>';

                    //Headers of the message
                    $headers = "From: " . $customerName . "<".$email.">\r\n";
                    $headers .=  "Reply-To: " . $customerName . "<".$email.">\r\n";
                    $headers .="Content-type: text/html\r\n";

                    //Sends the mail
                    //mail($to,$subject,$message, $headers);

                }else{
                    echo '<div class="section"> <h3 class="heading-3" >Budget is not valid!</h3> </div>';

                }

            }else{
                echo '<div class="section"> <h3 class="heading-3" >Date is not valid!</h3> </div>';

            }
        } else{
            echo'<div class="section"> <h3 class="heading-3" >Date must be in YYYY-MM-DD format</h3> </div>';
        }


    }

}
else{
    //echo 'Not all fields are complete';
}

require_once('Views/form.phtml');
