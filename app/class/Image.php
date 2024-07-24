<?php

#classe Image avec setter et getters


class Image {
    private $numUser;
    private $nameImg;
    private $adressImg;

    function __construct($nu, $n, $a){
        //echo'on rentre dans le construct de Image </br>';
        $this->numUser=$nu;
        $this->nameImg=$n;
        $this->adressImg=$a;
        //echo 'construct de image ok </br>';
    }
#setters
    function setNameImg($n) 
    {
    $this->nameImg=$n;
    }
#getters
    function getNumUser(){
    return $this->numUser;
    }
    function getNameImg(){
        return $this->nameImg;
    }
    function getAdressImg(){
        return $this->adressImg;
    }


}