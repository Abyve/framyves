<?php

class FrontController {

        private string $page;
        private string $action;
        private $pageExist;


        function __construct($pge,$act){

            echo 'entrée dans le constructeur de FrontControlller </br>';
            $this->$page=$pge;
            echo '$this->$page = '.$this->$page.'</br>';
            $this->$act=$action;
            $this->$pgExist=['1-1','2-1','3-1'];
        
        }

        
        
        
        
        
        function matc($pge,$act) {


            foreach ($this->$pgExist as $value) {
                echo 'on entre dans le foreach de match </br>';
                echo '$value = '.$value.'</br>';
                var_dump($value);
                //echo'</br> $this->$page est égale à '.var_dump($this->$page).'</br>';

                if ($value == $pge.'-'.$act) {
                    echo 'on rentre dans le if du foreach de match';
                    return true;
                }
            }
        echo' erreur 404 ';
        return false;    
        }




}