<?php
use PHPUnit\Framework\TestCase;
include dirname(__DIR__).'/app/class/controleur/ControleurInscription.php';
class ControleurInscriptionTest extends TestCase
{

    /*public function testMultiplication(){
        $this->assertEquals(4, 2*2);
    }
    */
    public function testObjet(){
        //$test=dirname(__DIR__).'/app/class/controleur/ControleurInscription.php';
        $actual=new ControleurInscription();
        $error=$actual->getError;
        //$this->assertSame('',$test);
        $this->assertFalse($error);


    }

}