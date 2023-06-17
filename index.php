<?php
include('app/FrontController.php');


$page=htmlspecialchars(($_GET['page']));
$action=htmlspecialchars(($_GET['action']));

 echo '$_GET[page] = '.$_GET['page'].' </br> $_GET[action] = '.$_GET['action'].' </br>';
 echo '$page = '.$page.' </br> $action = '.$action.' </br>';
var_dump($page);echo'</br>';

$controller= new FrontController($page,$action);
var_dump($controller->matc($page,$action));




