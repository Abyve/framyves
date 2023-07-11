<?php
include('app/FrontController.php');
include('app/modele/Modele.php');
include('app/class/Membre.php');
include('app/class/Image.php');


$page=htmlspecialchars(($_GET['page']));
$action=htmlspecialchars(($_GET['action']));

 echo '$_GET[page] = '.$_GET['page'].' </br> $_GET[action] = '.$_GET['action'].' </br>';
 echo '$page = '.$page.' </br> $action = '.$action.' </br>';
var_dump($page);echo'</br>';

$controller= new FrontController($page,$action);
var_dump($controller->matc($page,$action));
echo '</br>';
include('test_modeles.php');
