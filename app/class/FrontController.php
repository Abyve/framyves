<?php

class FrontController {

        private string $page;
        private string $action;
        private $pgExist;


        function __construct($pge,$act){

            echo 'entrée dans le constructeur de FrontControlller </br>';
            $this->page=$pge;
            echo '$this->page = '.$this->page.'</br>';
            $this->action=$act;
            $this->pgExist=['1-1','2-1','3-1'];
        
        }

        
        
        
        
        
        function matc() {


            foreach ($this->pgExist as $value) {
                echo 'on entre dans le foreach de match </br>';
                echo '$value = '.$value.'</br>';
                var_dump($value);
                echo'</br> $this->page est égale à '.$this->page.'</br>';

                if ($value == $this->page.'-'.$this->action) {
                    echo 'on rentre dans le if du foreach de match';
                    return true;
                }
            }
        echo' erreur 404 ';
        return false;    
        }




}