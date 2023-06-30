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
$model2=new Modele('images',1);
//var_dump(isset($model));
echo ' objet $modele est ci dessus </br>';
$objet=$model->find();
$objet2=$model2->find();
echo 'objet $objet est égale à '.$objet.'</br>';
var_dump($objet);
foreach($objet as $key => $value) {
    echo $key.' =>'.$value.'</br>';
}
echo 'objet2 $objet est égale à '.$objet2.'</br>';
var_dump($objet2);
foreach($objet2 as $key => $value) {
    echo $key.' =>'. $value.'</br>';
}



