<?php

class FrontController {

        private string $page;
        private string $action;
        private $pgExist;


        function __construct($pge,$act){

            //echo 'entrée dans le constructeur de FrontControlller </br>';
            $this->page=$pge;
            //echo '$this->page = '.$this->page.'</br>';
            $this->action=$act;
            $this->pgExist=['1-1','1-2','2-1','3-1','4-1','5-1','6-'.$act];//1-1 accueil 1-2 affiche img, 2-1 connexion,
        
        }

        
        
        
        
        
        function match() {


            foreach ($this->pgExist as $value) {
                //echo 'on entre dans le foreach de match </br>';
                //echo '$value = '.$value.'</br>';
                //var_dump($value);
                //echo'</br> $this->page est égale à '.$this->page.'</br>';
                
                if (($value == $this->page.'-'.$this->action) AND !isset($con)){
                    //echo 'on rentre dans le if du foreach de match';
                    $con= new Controleur($this->page,$this->action);
                    switch ($this->page) {
                        case 1 :
                            //$con= new Controleur($page,$action);
                            $match=$con->index($this->action);
                            return true;
                        case 2 :
                            /*echo 'on rentre dans le case 2';
                            $array = array(
                                "foo" => "bar",
                                "bar" => "foo",
                            );
                            //echo is_file(__DIR__.'/controleur/ControleurInscription.php');
                            
                            
                            var_dump($array);
                            */
                            $match=new ControleurInscription();
                            var_dump($_POST);
                            $match->render();
                            return true;
                        case 3 :
                            /*$match=$con->connexion();
                            return true;
                            */
                            echo 'case 3 frontController';
                            $match=new ControleurConnexion();
                            var_dump($match);
                            $match->render();
                            return true;
                        case 4 :
                            $match=$con->index();
                            return true;
                        case 5 :
                            $match=$con->deconnexion($deconnexion);
                            return true;

                        case 6 :
                            echo ' $action dans front controller est égale à '.$this->action;
                            $match=$con->suppImage($this->action);
                            return true;
                        
                    }
                    
                    
                }
            }
        echo' erreur 404 ';
        return false;    
        }




}