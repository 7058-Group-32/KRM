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
     public function addApplication($projectName, $description, $minRange, $maxRange, $deadline, $otherReq, $userID)
    {
         
        $sqlQuery = "INSERT INTO Application(ProjectName, Description, MinRange, MaxRange, Deadline, OtherRequirements, UserID) VALUES ('" . $projectName . "','" . $description . "','" . $minRange . "','" . $maxRange . "','" . $deadline . "','" . $otherReq . "'," . (int)$userID . ")";
        //$sqlQuery2 = "INSERT INTO Application(ProjectName, Description, MinRange, MaxRange, Deadline, OtherRequirements, UserID) VALUES ('Proj Test','Desc Test','Range Test','Max Test','Dead Test','Other Test',11)";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        //$statement2 = $this->_dbHandle->prepare($sqlQuery2);
        //$statement2->execute();
    }
    
    //Retrieves all of the applications from a given user
    public function getApplication($userID)
    {
        $sqlQuery = "SELECT * FROM Application WHERE UserID = $userID";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    public function fetchUserApplications($userId)
    {
        $sqlQuery = 'SELECT * FROM Application WHERE UserID=' . $userId;

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $app = new Application($row);
            $dataSet[] = $app;
        }
        return $dataSet;
    }
}
