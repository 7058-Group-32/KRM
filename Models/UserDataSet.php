<?php
require_once ('Models/Database.php');
require_once ('Models/User.php');
session_start();
class UserDataSet
{

    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    // allows to add user in user database.
    public function addUser($name, $email, $number, $address)
    {
        $sqlQuery = "INSERT INTO Users(Name, Email, Phone, Address) VALUES ('" . $name . "','" . $email . "','" . $number . "','" . $address . "')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }


    // to register user into the user database.
    public function register($name, $email, $number, $address, $password)
    {
        $sqlQuery = "INSERT INTO Users(Name, Email, Phone, Address, Password) VALUES ('" . $name . "','" . $email . "','" . $number . "','" . $address . "','" . $password . "')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // brings up the password from the user database when email address is matched with the user.
    public function fetchPassword($email)
    {
        $sqlQuery = "SELECT Password FROM Users WHERE Email='" . $email . "'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $row = $statement->fetch();

        if ($row != null) {
            return $row[0];
        } else {
            return null;
        }

    }

    // brings up the user from the user database when email address is matched with the user.

    public function fetchId($email)
    {
        $sqlQuery = "SELECT UserID FROM Users WHERE Email='".$email."'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $row=$statement->fetch();

        if ($row != null)
        {
            return $row[0];
        }

        else
        {
            return null;
        }
    }

    // to check the email address or to validate it eith right user id.
    public function uniqueEmailCheck($email)
    {
        $sqlQuery = "SELECT Email FROM Users";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $row=$statement->fetch();
        $count = 0;
        $found = false;
        while($count< count($row) && !$found) {

            if ($row[$count] = $email)
            {
                $found = true;
            }

            else{
                $count = $count +1;
            }
        }
        return $found;
    }

    // brings up all the information from the user database of the given fields when user enters its id
    public function fetchUser($userID)
    {
        $sqlQuery = 'SELECT Name, Email, Phone, Address FROM Users WHERE UserID = '.$userID;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $row=$statement->fetch();


        $_SESSION["na"] = $row[0];
        $_SESSION["em"] = $row[1];
        $_SESSION["add"] = $row[2];
        $_SESSION["pho"] = $row[3];

        return $row;

    }
    
    // to get the name of the customer using user id from the user database.
    public function getCustomerName($userID)
    {
        $sqlQuery = 'SELECT Name FROM Users WHERE UserID = '.$userID;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $row = $statement->fetch();

        if ($row != null) {
            return $row[0];
        } else {
            return null;
        }
    }

    // to delete the user from the database.
    public function deleteUser($userID)
    {
        $sqlQuery1 = 'UPDATE Application SET UserID=13 WHERE UserID='.$userID;
        $statement1 = $this->_dbHandle->prepare($sqlQuery1);
        $statement1->execute();
        $sqlQuery = 'DELETE FROM Users WHERE UserID = '.$userID;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // allows you to change the name .
    public function changeName($id, $newName)
    {
        $sqlQuery = "UPDATE Users SET Name = '" . $newName . "' WHERE UserID = ".$id ;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // to change the email address.
    public function changeEmail($id, $newEmail)
    {
        $sqlQuery = "UPDATE Users SET Email = '" . $newEmail . "' WHERE UserID = ".$id ;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // to update the number
    public function changeNumber($id, $newNumber)
    {
        $sqlQuery = "UPDATE Users SET Phone = '" . $newNumber . "' WHERE UserID = ".$id ;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // to change address.
    public function changeAddress($id, $newAddress)
    {
        $sqlQuery = "UPDATE Users SET Address = '" . $newAddress . "' WHERE UserID = ".$id ;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    // allows the user to change its password.
    public function changePassword($id, $newPassword)
    {
        $sqlQuery = "UPDATE Users SET Password = '" . $newPassword . "' WHERE UserID = ".$id ;
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }
}
