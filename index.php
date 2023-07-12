<?php
ob_start();
include('app/class/FrontController.php');
include('app/modele/Modele.php');
include('app/class/Membre.php');
include('app/class/Image.php');
include('app/class/Vue.php');
include('app/class/Controleur.php');
//include('app/class/function/cookie.php');

$page=htmlspecialchars(($_GET['page']));
$action=htmlspecialchars(($_GET['action']));

/* echo '$_GET[page] = '.$_GET['page'].' </br> $_GET[action] = '.$_GET['action'].' </br>';
 echo '$page = '.$page.' </br> $action = '.$action.' </br>';
var_dump($page);echo'</br>';
*/
$Fcontroller= new FrontController($page,$action);
$Fcontroller->matc();
//$cont= new Controleur($page,$action);
//$cookie=$cont->index();




//include('test_modeles.php');
