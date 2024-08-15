<?php
declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
include dirname(__DIR__).'/app/class/controleur/ControleurInscription.php';
    
    class ControleurInscriptionTest extends TestCase
    {   
        public static function PostProvider(): array {   
            return [
                ['test1@fai.fr','test1','t','yann',false] ,   
                ['','','','',true],
                ['test1@fai.fr','','','',true],
                ['','test1','','',true],
                ['','','t','',true],
                ['','','','yann',true],
                ['','','','',true],
                   
            
            
            ];
        }
        #[DataProvider('PostProvider')]    
        
        public function test__construct($email,$nom,$prenom,$pwd,$errorExpected):void {
            $_POST['email']=$email;
            $_POST['nom']=$nom;
            $_POST['prenom']=$prenom;
            $_POST['pwd']=$pwd;
            $actual=new ControleurInscription();
            $error=$actual->getError();
            //$this->assertSame('',$test);
            $this->assertSame($errorExpected,$error);
        }
    }
    

