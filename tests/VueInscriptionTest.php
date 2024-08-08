<?php
use PHPUnit\Framework\TestCase;
include (dirname(__DIR__)).'/app/class/vue/VueInscription.php';
class VueInscriptionTest extends TestCase
{

    /*public function testMultiplication(){
        $this->assertEquals(4, 2*2);
    }
    */
    /*public function testConstruct() {
        //$test=(dirname(__DIR__)).'/app/class/vue/VueInscription.php';
        //$test=dirname(__DIR__).'/app/class/controleur/ControleurInscription.php';
        $actual=new VueInscription('toto@fai.fr','user','toto','mdp',false);
        $actuEmail=$actual->getEmail();
        $actuNom=$actual->getNom();
        $actuPrenom=$actual->getPrenom();
        $actuPwd=$actual->getPwd();
        $actuError=$actual->getError();
        $this->assertSame('toto@fai.fr',$actuEmail);
        $this->assertSame('user',$actuNom);
        $this->assertSame('toto',$actuPrenom);
        $this->assertSame('mdp',$actuPwd);
        $this->assertFalse($actuError);
        

    }
    
    public function testShowForm() {
    




    }
 */
}
   