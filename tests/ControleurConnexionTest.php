<?php
declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
include dirname(__DIR__).'/app/class/controleur/ControleurConnexion.php';


class ControleurConnexionTest extends TestCase
{   
    public static function PostProvider(): array {   
        return [
            ['test1@fai.fr','yann',false] ,   
            ['','',true],
            ['test1@fai.fr','',true],
            ['','yann',true],
        ];
    }

    #[DataProvider('PostProvider')]    
        
    public function test__construct($email,$pwd,$errorExpected):void {
        $_POST['email']=$email;
        $_POST['pwd']=$pwd;
        $actual=new ControleurConnexion();
        $error=$actual->getError();
        //$this->assertSame('',$test);
        $this->assertSame($errorExpected,$error);
    }

 
}


