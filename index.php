<?php
ob_start();
include_once('app/class/FrontController.php');
include_once('app/modele/Modele.php');
include_once('app/modele/ModeleAuthentification.php');

include_once('app/class/Membre.php');
include_once('app/class/Image.php');
include_once('app/class/Vue.php');
include_once('app/class/Controleur.php');
include_once ('app/class/controleur/ControleurInscription.php'); 
include_once ('app/class/vue/VueInscription.php');

//echo 'is file VueConnexion :'.is_file('app/class/vue/VueConnexion.php');
//echo 'is file ControleurConnexion :'.is_file('app/class/controleur/ControleurConnexion.php');
include_once ('app/class/controleur/ControleurConnexion.php'); 
include_once ('app/class/controleur/ControleurAuthentification.php'); 
include_once ('app/class/vue/VueConnexion.php');
include_once ('app/class/vue/VueConnecte.php');
echo 'is file VueConnecte :'.is_file('app/class/vue/VueConnecte.php');


//include_once('app/class/function/cookie.php');

$page=htmlspecialchars(($_GET['page']));
$action=htmlspecialchars(($_GET['action']));

 /*echo '$_GET[page] = '.$_GET['page'].' </br> $_GET[action] = '.$_GET['action'].' </br>';
 echo '$page = '.$page.' </br> $action = '.$action.' </br>';
var_dump($page);echo'</br>';
*/
$Fcontroller= new FrontController($page,$action);
$Fcontroller->match();
//$cont= new Controleur($page,$action);
//$cookie=$cont->index();



//ob_end_flush();
//include_once('test_modeles.php');
