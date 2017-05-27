<?php
    $action = 'noaction';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch ($action){
        case 'blogEdit': include_once 'blogEdit.php'; break;
        case 'loadmessages': include_once 'loadmessages.php'; break;
        case 'showVisitors': include_once 'showVisitors.php'; break;
    }
    ob_start();
?>