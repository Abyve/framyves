<?php
declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
include dirname(__DIR__).'/app/modele/ModeleAuthentification.php';
//include dirname(__DIR__).'/app/class/controleur/ControleurAuthentifcation.php';   

class ControleurAuthentificationTest extends TestCase {

   /* public function testCreateConfiguredStub(): void
    {
        $m = $this->createConfiguredStub(
            ModeleAuthentification::class,
            [
                'chercheEmail'     => true,
                'cherchePwd' => false,
            ]
        );
    }
    */

    public function testVerif():void {
        $m = $this->createConfiguredStub(
            ModeleAuthentification::class,
            [
                'chercheEmail'     => true,
                'cherchePwd' => false,
            ]
        );

       
        $actual=new ControleurAuthentification('','');
        $this->assertSame($m->chercheEmail(),$actual->verif());
        $this->assertSame($m->cherchePwd(),$actual->verif());
        



    }



}