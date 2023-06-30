<?php
include('app/FrontController.php');
include('app/modele/Modele.php');


$page=htmlspecialchars(($_GET['page']));
$action=htmlspecialchars(($_GET['action']));

 echo '$_GET[page] = '.$_GET['page'].' </br> $_GET[action] = '.$_GET['action'].' </br>';
 echo '$page = '.$page.' </br> $action = '.$action.' </br>';
var_dump($page);echo'</br>';

$controller= new FrontController($page,$action);
var_dump($controller->matc($page,$action));

$model= new Modele('membres',1);
//var_dump(isset($model));
echo ' objet $modele est ci dessus </br>';
$objet=$model->find();
echo 'objet $objet est égale à '.$objet.'</br>';
var_dump($objet);
foreach($objet as $key => $value) {
    echo $key.' =>.'. $value.'</br>';
}




