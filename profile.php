<?php
$view = new stdClass();
$view->pageTitle = 'Profile';

require_once('Models/UserDataSet.php');


$view->profileError = null;

$view->profileErrorTemplate = '<div class="text-block">'.$view->profileError.'</div>';

$userData = new UserDataSet();

$id = $_SESSION["userid"];
$view->name = $_SESSION["na"];
$view->email = $_SESSION["em"];
$view->phoneNo = $_SESSION["pho"];
$view->address = $_SESSION["add"];

if(isset($_POST['delete']))
{
    $userData->deleteUser($id);
    unset($_SESSION["loggedin"]);
    unset($_SESSION["userid"]);
    header("Location: index.php");
    session_destroy();
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
        $view->name = $newName;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

    if ($newEmail != null)
    {
        $userData->changeEmail($id, $newEmail);
        $_SESSION["em"] = $newEmail;
        $view->email = $newEmail;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

    if ($newNumber != null)
    {
        $userData->changeNumber($id, $newNumber);
        $_SESSION["add"] = $newNumber;
        $view->address = $newNumber;
        $view->profileError = "Thank You! Your profile has been edited!";
    }

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



require_once('Views/profile.phtml');
?>