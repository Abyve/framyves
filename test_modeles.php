<?php
$model= new Modele('membres',11);
$model2=new Modele('images',3);
//var_dump(isset($model));
//echo ' objet $modele est ci dessus </br>';
//$member=new Membre('Abiven','Yves','yves@chezmoi.fr','yann');
//$n=$member->getName();
//echo '$member-getName() est égale à '.$n.'</br>';
//$image= new Image('1','chat','chat.jpeg');
$m=$model->delete();
$i=$model2->delete();

/*echo 'objet $m est égale à '.$m.'</br>';
//var_dump($m);
foreach($m as $key => $value) {
    echo $key.' =>'.$value.'</br>';
}
echo 'objet2 $i est égale à '.$i.'</br>';
var_dump($i);
foreach($i as $key => $value) {
    echo $key.' =>'. $value.'</br>';
}
*/