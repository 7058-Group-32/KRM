<?php
$view = new stdClass();
$view->pageTitle = 'Homepage';

session_start();

// accessing the index.phtml for once.
require_once('Views/index.phtml');
?>
