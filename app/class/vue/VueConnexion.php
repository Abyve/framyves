<?php

class VueConnexion extends VueBase {

    protected $email;
    protected $pwd;
    protected $error;
    protected $contenu;


    function form($e,$pwd,$error):string {

        $form='
                            <div class="col-12 col-md-10 bg-light">
                                <div class="conteneurFormCon" >
                                    <form action="index.php?page=2&action=1" method="POST">
                                        <div>
                                            <label for="email">Email : </label>
                                            <input type="text" id="email" name="email" value="'.$e.'" />
                                        </div>
                                        <div>
                                            <label for="pwd">Mot de Passe : </label>
                                            <input type="text" id="pwd" name="pwd" value="'.$pwd.'" />
                                        </div>
                                        <div>
                                            <input type="submit" id="envoie" name="envoie" value="envoie" />
                                        </div>
                                    </form>';
        $msgError='
                                    <br /> Merci de bien remplir tout le formulaire !
                                </div>
                            </div>';

        $this->contenu=$form.$msgError;
        return $this->contenu;


    }
    function formSuccess() {

        $msg='
            <div class="col-12 col-md-10 bg-light">
                Votre formulaire est correcte et il a été traité. Merci!
            </div>';       
        $this->contenu= $msg;
        return $this->contenu;
        


    }

    function show() {

        echo $this->corps.$this->contenu.$this->footer;

    }






    }





