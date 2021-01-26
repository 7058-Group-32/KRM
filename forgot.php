<?php
$view = new stdClass();
$view->pageTitle = 'Homepage';

session_start();

// accessing the forgot.phtml for once.
require_once('Views/forgot.phtml');
?>