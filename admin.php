<?php 
    session_start();
    echo $_GET['url'];
    spl_autoload_register(function($className){
        include_once 'core/' . $className . '.php';
    });
    require_once 'ecom/models/Model.php';
    $App= new Appadmin();
?>