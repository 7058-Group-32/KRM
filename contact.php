<?php

$view = new stdClass();
$view->pageTitle = 'Contact';

session_start();

require_once('Views/contact.phtml');
?>
