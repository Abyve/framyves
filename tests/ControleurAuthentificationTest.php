<?php
declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
include dirname(__DIR__).'/app/class/modele/ModeleAuthentification.php';
include dirname(__DIR__).'/app/class/controleur/ControleurAuthentification.php';   

class ControleurAuthentificationTest extends TestCase {

   /*public function testCreateConfiguredStub(): void
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
    public static function PostProvider(): array {   
        return [
            ['test1@fai.fr','yann'] ,   
            ['',''],
            ['test1@fai.fr',''],
            ['','yann'],
        ];
    }
    #[DataProvider('PostProvider')]    
    public function testVerif($email,$pwd):void {
       /*$m = $this->createConfiguredStub(
            ModeleAuthentification::class,
            [
                'chercheEmail' => true,
                'cherchePwd' => false,
            ]
        );
       */ 
       
        /*$actual= $this->createConfiguredStub(
            ControleurAuthentification::class,
            [
                //'verif' => true,
                'getEmail' => $email,
                'getPwd' => $pwd,
            ]
            );
*/          $actual=new ControleurAuthentification($email,$pwd);
            $m = $this->createConfiguredStub(
            ModeleAuthentification::class,
            [   
                'getEmail' =>$email,
                'getPwd' => $pwd,
                'chercheEmail'  => [$email],
                'cherchePwd' => [$email,$pwd],
            ]
        );
        $this->assertSame($m->chercheEmail(),$actual->verif());
        $this->assertSame($m->cherchePwd(),$actual->verif());
       // $this->assertSame($m->cherchePwd(),$actual->verif());
        



    }



}