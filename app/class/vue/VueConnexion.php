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
                                    <form action="index-3-1" method="POST">
                                        <div class="form-group" >
                                            <label for="email">Email : </label>
                                            <input type="email" class="form-control" id="email" name="email" value="'.$e.'" />
                                        </div>
                                        <div class="form-group"  >
                                            <label for="pwd">Mot de Passe : </label>
                                            <input type="password" class="form-control" id="pwd" name="pwd" value="'.$pwd.'" />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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





