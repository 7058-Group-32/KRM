<?php
require_once ('Models/Database.php');
require_once ('Models/User.php');
class UserDataSet
{

    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function addUser($name, $email, $number, $address)
    {
        $sqlQuery = "INSERT INTO Users(Name, Email, Phone Number, Address) VALUES ('" . $name . "','" . $email . "','" . $number . "','" . $address . "')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    public function register($name, $email, $number, $address, $password)
    {
        $sqlQuery = "INSERT INTO Users(Name, Email, Phone, Address, Password) VALUES ('" . $name . "','" . $email . "','" . $number . "','" . $address . "','" . $password . "')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

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
}
