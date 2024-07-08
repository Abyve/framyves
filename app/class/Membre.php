<?php

#classe Membre avec getters et setters en privé
#
#
class Membre {

   private $numUser;
    private $name;
    private $firstName;
    private $email;
    private $pwd;

    function __construct($numU,$n, $f, $e, $p)
    {
        //echo 'on rentre dans le construct de Membre </br>';
        $this->numUser=$numU;
        $this->name=$n;
        $this->firstName=$f;
        $this->email=$e;
        $this->pwd=$p;
        //echo'</br>creation nouveau membre ok </br>';


    }
#setters
    function setName($n) 
    {
        $this->name=$n;

    }
    function setFirstName($f) 
    {
        $this->firstName=$f;

    }
    function setEmail($e) 
    {
        $this->email=$e;

    }
    function setPwd($p) 
    {
        $this->pwd=$p;

    }
#getters
    function getNumUser()
    {
        return $this->numUser;
    }
    function getName()
    {
       return $this->name;
    }
    function getFirstName()
    {
       return $this->firstName;
    }
    function getEmail()
    {
       return $this->email;
    }
    function getPwd()
    {
       return $this->pwd;
    }

    function __toString() {

        $retour='
                                    <div>
                                        <p>
                                            le membre a pour numuser '.$this->numUser.' <br />
                                            a pour name '.$this->name.' <br />
                                            a pour firstname '.$this->firstName.'<br />
                                            a pour email '.$this->email.'<br />
                                        </p>';
        return $retour;
    }



}