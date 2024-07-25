<?php
class Controleur {
    //private $page;
   // private $action;

        function __construct($pg,$act)
        { 
            //echo 'on rentre dans le construct de controleur';
            $this->page=$pg;
            $this->action=$act;

        }
        function nettoieDossierImage($images)
        {
            //echo 'var_dump($images) dans nettoieDossierImage ';
            //var_dump($images);
            $cookie=(isset($_COOKIE['email'])) ? htmlspecialchars(trim($_COOKIE['email'])) : '';
            $path='./upload/'.$cookie;
            if (is_file($path)) 
            {
                $scandir=scandir($path);
                $filesInBdd=[];
                foreach ($images as $key => $img) {
                    
                    
                    $filesInBdd[]=$images[$key]['nameimg'];
                    
                }
                if (isset($filesInBdd) && isset($scandir)) {
                    $result=array_diff($scandir,$filesInBdd);
                    }
                //echo '<br /> $scandir <br />';
                //var_dump($scandir);
                
                //echo '<br /> $filesInBdd <br />';
                //var_dump($filesInBdd);
            
                //echo '<br />';
                //echo '<br /> $result <br />';
                //var_dump($result);
                foreach ($result as $value)
                {
                    $path2=$path.'/'.$value;
                    if (is_file($path2))
                    {
                    //echo 'on efface le fichier : <br />'.$path2.'<br />';
                    $info=unlink($path2);
                    }
                }
            }                   

        }

        function index($action=1) {
            
            $cookie=(isset($_COOKIE['email'])) ? htmlspecialchars(trim($_COOKIE['email'])) : '';
            if (!empty($cookie)){
                $m = new Modele('membres');     // on créé un objet membre
                $membre=$m->getMembre($cookie);
                //var_dump($membre);
                $m2=new Modele('images',$membre->getNumUser());
                //var_dump($m2);echo ' <br /> $m2 dans controleur <br />';
                $images=$m2->find();  
                $this->nettoieDossierImage($images);
                //var_dump($images); echo '<br /> $images dans controleur <br />';
                $resultFichier=$this->fichier();
                $vue= new Vue($cookie,$membre);
                //$fichier=$vue->fichier($result);
                $vue->index($cookie,$resultFichier,$action,$images);
                //ob_end_flush();
            }
            else {

                $vue= new Vue();
                $vue->index();
            }
        }
    
     
        function inscription()
        {
            $error = FALSE;
            $nom = (isset($_POST['nom'])) ? htmlspecialchars(trim($_POST['nom'])) : '';
            $prenom = (isset($_POST['prenom'])) ? htmlspecialchars(trim($_POST['prenom'])) : '';
            $email = (isset($_POST['email'])) ? htmlspecialchars(trim($_POST['email'])) : '';
            if (!(filter_var($email,FILTER_VALIDATE_EMAIL))) {$email='';};
            $pwd_form = (isset($_POST['pwd_form'])) ? htmlspecialchars(trim($_POST['pwd_form'])) : '';
            if (isset($_POST['submit'])) {
                if ( empty($nom) OR empty($prenom) OR empty($pwd_form) OR empty($email)) {
                    $error = TRUE;
                }
                else
                {
                        $membre=new Membre($numU,$nom,$prenom,$email,$pwd_form);
                        echo '$membre->name '.$membre->getName().'</br>';
                        echo '$membre->firstName '.$membre->getFirstName().'</br>';
                        echo '$membre->email '.$membre->getEmail().'</br>';
                        echo '$membre->pwd '.$membre->getPwd().'</br>';
                        echo '$error = '.var_dump($error).'</br>';
                        $m=new Modele('membres');
                        $code=12345678;
                        $sujet='Verification de votre email';
                        $message='Votre inscription sur notre site est validé \r\n';
                        $mailSend=mail($email, $sujet, $message);
                        var_dump($mailSend);
                        if ($mailSend){
                            echo 'mail envoyé membre enregistre en bdd';
                            $m->insert($membre);
                        }
                }
            }
            $vue=new Vue();
            echo $vue->inscription($error,$email,$nom,$prenom,$pwd_form);
        }

        function connexion() {
       
            $cookie= (isset($_COOKIE['email']) ? htmlspecialchars(trim($_COOKIE['email'])) : '');
            $error=false;
            $email= (isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '');
            if (!(filter_var($email,FILTER_VALIDATE_EMAIL))) {$email='';};
            $pwd_connexion= (isset($_POST['pwd_connexion']) ? htmlspecialchars(trim($_POST['pwd_connexion'])) : '');
            if (empty($cookie)) {
                if (isset($_POST['submit'])) {
                // Validation des données
                    if (empty($pwd_connexion) OR empty($email)) {
                        $error = TRUE;
                    }
                    $m=new Modele('membres');
                    $m->pas_de_cookie($error,$email,$pwd_connexion);
                    //echo '$cookie est égale à '.$cookie.'</br>';
                }
            }
            else    {
                header('location:index-1-1');
            }
            $v= new Vue();
            $v->connexion($error,$email,$pwd_connexion);
        ob_end_flush();
    }
    function fichier() {
            $cookie=(isset($_COOKIE['email']) ? htmlspecialchars(trim($_COOKIE['email'])) : '');
            //$cookie='test@test';
            //echo '$cookie = '.$cookie.'</br>';
            if (!file_exists('upload/')) {

                mkdir('upload');

            }
            if (isset($_FILES['upload_files'])) {
                $jeton=rand(1,9999);
                $finfo=finfo_open(FILEINFO_MIME_TYPE);
                $mimeType=finfo_file($finfo, $_FILES['upload_files']['tmp_name']);
                //echo ' $mimeType ';
                //var_dump($mimeType);
               
                $verifMimeType=true;

                if (($mimeType=='image/png') OR ($mimeType=='image/jpeg')){$verifMimeType=true;}
                //echo '$verifMimeType ='.$verifMimeType.'<br />';
                $dossier='upload/'.$cookie.'/';
                //echo '$dossier = '.$dossier;
                
                if (!file_exists($dossier)) {

                    mkdir($dossier);
        
                }
                //$fichier=$jeton.basename($_FILES['upload_files']['name']);
                $fichier = pathinfo($_FILES['upload_files']['name'], PATHINFO_FILENAME).'-'.$jeton.'.'.pathinfo($_FILES['upload_files']['name'], PATHINFO_EXTENSION);
                $max_file_size=100000;
                if (filesize($_FILES['upload_files']['tmp_name'])>$max_file_size)
                {
                    $result='Fichier trop volumineux';
                
                ;
                }
                elseif (($verifMimeType) AND (move_uploaded_file($_FILES['upload_files']['tmp_name'],$dossier.$fichier)))
                {
                    $result='Upload réussi';
                    
                    $mo= new Modele('images');
                    $membre=$mo->getMembre($cookie);
                    $numUser=$membre->getNumUser();
                    $adressImg=$dossier.$fichier;

                    //echo 'adressImg dans fichier : '.$adressImg.'<br />';
                    $i= new Image($numUser, $fichier,$adressImg);
                    $mo->insert($i);
                    $result='ajout image bdd ok ';
                    
                
                    #include 'ajout  image en bdd'
                }
                else
                {   
                    $result='Echec transfert fichier';   
                }
            
            return $result;
            //$v= new Vue($cookie);
            //$v->fichier($result);
            }
                
        
        
    }

    function deconnexion() {

        setcookie('email',$email,time()-3600);
        echo 'on rentre dans la fonction deconnexion </br>';
        $v =new Vue();
        header("location:index-1-1");

        


    }

    function suppImage($numImg) {
        echo 'on rentre dans suppImage <br />';
        $m=new Modele('images',$numImg);
        $m->delete();
        header("location:index-1-1");



    }
}

