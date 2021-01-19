<?php
$view = new stdClass();
$view->pageTitle = 'Profile';

session_start();

require_once('Views/profile.phtml');
?>