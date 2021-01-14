<?php
require_once ('Models/Database.php');
require_once ('Models/Application.php');
class ApplicationDataSet
{

    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }
    
    //Adds an application to the database
     public function addApplication($projectName, $customerName, $description, $minRange, $maxRange, $deadline, $otherReq, $userID)
    {
        $sqlQuery = "INSERT INTO Users(ProjectName, CustomerName, Description, MinRange, MaxRange, Deadline, OtherRequirements, UserID)
        VALUES ('" . $projectName . "','" . $customerName . "','" . $description . "','" . $minRange . "'. $maxRange . "','" . $deadline . "','" . $otherReq . "','" . $userID . "')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }
    
}
