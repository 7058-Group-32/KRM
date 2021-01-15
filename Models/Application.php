<?php
class Application
{

    protected $_appID, $_projectName, $_description, $_minRange, $_maxRange, $_deadline, $_otherReq, $_userID;

    //Constructor of Applications from the database
    public function __construct($dbRow)
    {
        $this->_appID = $dbRow['ApplicationID'];
        $this->_projectName = $dbRow['ProjectName'];
        //$this->_customerName = $dbRow['CustomerName'];
        $this->_description = $dbRow['Description'];
        $this->_minRange = $dbRow['MinRange'];
        $this-> _maxRange = $dbRow['MaxRange'];
        $this->_deadline = $dbRow['Deadlines'];
        $this->_otherReq = $dbRow['OtherRequirements'];
        $this->_userID = $dbRow['UserID'];

    }
    
    public function getApplicationID(){
        return $this->_appID;
    }
    public function getProjectName(){
        return $this->_projectName;
    }

    public function getDescription(){
        return $this->_description;
    }
    public function getMinRange(){
        return $this->_minRange;
    }
    public function getMaxRange(){
        return $this->_maxRange;
    }
    public function getDeadline(){
        return $this->_deadline;
    }
    public function getOtherReq(){
        return $this->_otherReq;
    }
    public function getUserID(){
        return $this->_userID;
    }
}
