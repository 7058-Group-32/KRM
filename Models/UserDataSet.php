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

    public function addUser($email, $password)
    {
        $sqlQuery = "INSERT INTO Users(Email, Password) VALUES ('" . $email . "','" . $password . "')";
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
