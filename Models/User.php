<?php
class User
{
    protected $_email, $_phone, $_address;

    // Constructor of User from database
    public function __construct($dbRow)
    {
        $this->_email=$dbRow[0];
        $this->_phone=$dbRow[1];
        $this->_address=$dbRow[2];
    }
    // public get functions to retrieve data of given fields from the database.
    public function getEmail() {
        return $this->_email;
    }

    public function getPhone() {
        return $this->_phone;
    }

    public function getAddress() {
        return $this->_address;
    }
}