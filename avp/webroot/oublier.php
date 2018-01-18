<?php
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}
    if(isset($_POST['submit'])&& !empty($_POST['submit'])){

        if(isset($_POST['resetPassword']) && !empty($_POST['resetPassword'])){
            $sql = "SELECT UTIL_EMAIL FROM utilisateurs WHERE UTIL_EMAIL = '". $_POST['resetPassword']."'";
            $req = mysql_query($sql);
            $n = mysql_num_rows($req);
            $message='';
            if($n > 0){
                $email = $_POST['resetPassword'];
                $newPassword = chaine_aleatoire(8);
                $sql = "UPDATE utilisateurs SET UTIL_MDP = '".sha1($newPassword)."' WHERE UTIL_EMAIL = '".$email."'";
                $result = mysql_query($sql);
                $messages='Votre nouveau mot de passe est <b>'.$newPassword.'</b> <br/> Modifier le à votre prochaine connexion sur notre site.';
                $headers = "Content-Type: text/html; charset=\"utf-8\"";
                mail($email, "Reinitialisation mot de passe", $messages,$headers);
                $message = "<font color='blue'>Mot de passe reinitialisé avec succès.</font>";

                } else {
                $message = "<font color='red'>L'email n'existe pas.</font>";
                           }
        }else{
            $message ="<font color='red'>Veuillez saisir votre adresse email!</font>";
        }

    }

?>
<br/>
<div class="forgot-password">
    <h2 class="center">Mot de passe oublié ?</h2>

    <p class="mini-fonts center">
        Pour réinitialiser votre mot de passe, saisissez l'adresse e-mail associé à votre compte.
    </p>

    <div class="content-center">
        <form action="" method="post">
            <div>
                <p align="center">
                    <?php if(isset( $message))
                        echo  $message;
                    ?></p><br/>
                <table>

                    <tr>
                        <td><label>Votre adresse éléctronique</label></td>
                        <td><input type="text" name="resetPassword" value=""/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align=""><input type="submit" name="submit" value="Valider"/></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>