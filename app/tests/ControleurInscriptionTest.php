<?php
use PHPUnit\Framework\TestCase;
include '../class/controleur/ControleurInscription.php';
class ControleurInscriptionTest extends TestCase
{

    public function testMultiplication(){
        $this->assertEquals(4, 2*2);
    }

    public function testObjet(){

        $actual=new ControleurInscription();
        $this->assertTrue($actual->error);



    }

}