<?php
$view = new stdClass();
$view->pageTitle = 'Profile';

require_once('Models/UserDataSet.php');


$view->profileError = null;

$view->profileErrorTemplate = '<div class="text-block">'.$view->profileError.'</div>';

//creates new UserDataSet class
$userData = new UserDataSet();

$id = $_SESSION["userid"];
//echo $id;
$view->name = $_SESSION["na"];
$view->email = $_SESSION["em"];
$view->phoneNo = $_SESSION["pho"];
$view->address = $_SESSION["add"];

// if user click delete then it will remove the user from the database.
if(isset($_POST['delete']))
{
    $userData->deleteUser($id);
    unset($_SESSION["loggedin"]);
    unset($_SESSION["userid"]);
    header("Location: index.php");
    session_destroy();
}

// this saves the user's details which he/she changed
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

    // checks the name field
    if ($newName != null)
    {
        $userData->changeName($id, $newName);
        $_SESSION["na"] = $newName;
        $view->name = $newName;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

    // checks the email field
    if ($newEmail != null)
    {
        $userData->changeEmail($id, $newEmail);
        $_SESSION["em"] = $newEmail;
        $view->email = $newEmail;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

    // checks the number field
    if ($newNumber != null)
    {
        $userData->changeNumber($id, $newNumber);
        $_SESSION["add"] = $newNumber;
        $view->address = $newNumber;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

    // checks the address fields along with the post
    if ($newAddress1 != null || $newAddress2 != null || $newPostcode != null)
    {
        if ($newAddress1 != null && $newAddress2 != null && $newPostcode != null)
        {
            $newAddress = $newAddress1 . ', ' . $newAddress2 . ', ' . $newPostcode;
            $userData->changeAddress($id, $newAddress);
            $_SESSION["pho"] = $newAddress;
            $view->phoneNo = $newAddress;
        }

        else
        {
            $view->profileError = "Please fill in your full address to update it";
        }
    }

    // checks the password fields, then verify the account, then validates the password
    if ($oldPassword != null || $newPassword1 != null || $newPassword2 != null)
    {

        if ($oldPassword != null && $newPassword1 != null && $newPassword2 != null)
        {
            $userPass = $oldPassword;
            $userEmail = $view->email;
            $verify = password_verify($userPass, $userData->fetchPassword($userEmail));
            // login button was pressed create a session
            if ($verify==1)
            {
                if ($newPassword1 == $newPassword2)
                {
                    $password = $newPassword1;

                    // Validate password strength
                    $uppercase = preg_match('@[A-Z]@', $password);
                    $lowercase = preg_match('@[a-z]@', $password);
                    $number    = preg_match('@[0-9]@', $password);
                    $specialChars = preg_match('@[^\w]@', $password);

                    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                        $view->profileError = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

                    }

                    else {
                        $encryptedPass= password_hash($password,PASSWORD_DEFAULT);
                        $userData->changePassword($id, $encryptedPass);
                        $view->profileError = "Thank You! Your profile has been edited!";
                    }
                }

                else {
                    $view->profileError = "Oops! Your passwords do not match!";
                }
            }

            else
            {
                $view->profileError = "Current password incorrect! Please try again.";

            }
        }

        else
        {
            $view->profileError = "Please fill in your current password and confirm your new password to update it";
        }
    }
}


// accessing profile.phtml once.
require_once('Views/profile.phtml');
?>