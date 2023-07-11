<?php 
    function cookie() {
    echo 'on est dans la function cookie </br>';
    /*$cookie= (isset($_COOKIE['email']) ? htmlspecialchars(trim($_COOKIE['email'])) : '');
    //echo '$cookie au debut du script ='.$cookie.'</br>';
    $error=false;
    $email= (isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '');
    $pwd_connexion= (isset($_POST['pwd_connexion']) ? htmlspecialchars(trim($_POST['pwd_connexion'])) : '');
    //echo 'email soumis au debut du script ='.$email.'</br>';
    if ($cookie!=='') {
        return $cookie;
    }
    else { 
    // echo 'pas de cookie';
        //include('pas_de_cookie.php');
    
        //$error=pas_de_cookie($error,$email,$pwd_connexion);
        //echo '$error après traitement function pas_de_cookie = '.$error.'</br>';
    }
    ob_end_flush();
    //include 'vue/vue_connexion.php';
    //echo ('apres vue_connexion');

*/
        return 'cookie present';
}