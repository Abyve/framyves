<?php
class Formulaire {
   
    function __construct() {



    }
    function inscription() {

    <div id="conteneur">
        <?php if (isset($_POST['submit']) AND !$error) : ?>
    <div>
    Toutes les données ont été soumises.
    </div>
        <?php else : ?>
    <form action="index.php?page=2&action=1" method="POST">
        <div>
            <label for="email">Email : </label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
            <?php if ($error AND empty($email)) : ?>
            <div class="erreur">Le champ email est obligatoire</div>
            <?php endif; ?>
        </div>
        <div>
            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" />
            <?php if ($error AND empty($nom)) : ?>
            <div class="erreur">Le champ nom est obligatoire</div>
            <?php endif; ?>
        </div>
        <div>
            <label for="prenom">Prénom : </label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" />
            <?php if ($error AND empty($prenom)) : ?>
            <div class="erreur">Le champ prénom est obligatoire</div>
            <?php endif; ?>
            </div>
         <div>
            <label for="pwd_form">Mot de passe </label>
            <input type="text" id="pwd_form" name="pwd_form" value="<?php echo $pwd_form ?>" />
            <?php if ($error AND empty($pwd_form)) : ?>
            <div class="erreur">Le champ Mot de passe est obligatoire</div>
            <?php endif; ?>
        </div>
        <div>
            <label for="submit">&nbsp;</label>
            <input type="submit" name="submit" value="Envoyer" />
            </div>
            </form>
            <?php endif; ?>
        </div>





    }




}