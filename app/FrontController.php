<?php

class FrontController {

        private $page;
        private $action;
        private $pageExist;


        function __construct($pge,$act){

            echo 'entrée dans le constructeur de FrontControlller </br>';
            $this->$page=$pge;
            $this->$act=$action;
            $this->$pageExist=['1-1','2-1','3-1'];
        
        }

        
        
        
        
        
        function match() {


            foreach ($this->$pageExist as $value) {
                echo 'on entre dans le foreach de match </br>';

                if ($value == $this->$page.'-'.$this->$action) {
                    echo 'on rentre dans le if du foreach de match';
                    return true;
                }
                else {
                    echo ' erreur 404';
                    return false;
                }                

            }
        }




}