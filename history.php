<?php

$view = new stdClass();
$view->pageTitle = 'History';

session_start();



require_once('Views/history.phtml');
?>