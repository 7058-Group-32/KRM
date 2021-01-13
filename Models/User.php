<?php
class User
{
    protected $_userEmail, $_loggedin, $_userID;

    public function __construct()
    {
        session_start();
        $this->_userEmail="No user";
        $this->_loggedin=false;
        $this->_userID=0;

        if (isset($_SESSION["login"]))
        {
            $this->_userEmail=$_SESSION["login"];
            $this->_userID=$_SESSION["uid"];
            $this->_loggedin=true;
        }
    }

    public function initialise()
    {
        $this->_userEmail="No user";
        $this->_loggedin=false;
        $this->_userID=0;

        if (isset($_SESSION["login"]))
        {
            $this->_username=$_SESSION["login"];
            $this->_userID=$_SESSION["uid"];
            $this->_loggedin=true;
        }
    }
}