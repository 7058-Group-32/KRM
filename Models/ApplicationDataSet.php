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
}