<?php
class Application
{

    protected $_applicationID;

    public function __construct($dbRow)
    {
        $this->_applicationID = $dbRow[0];

    }
}