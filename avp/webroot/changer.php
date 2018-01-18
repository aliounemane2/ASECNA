<?php unset($_SESSION['message']); ?>
<?php 
	if(isset($_POST['valider'])){
		if(!empty($_POST['newPassword'])){
			if ($_POST['newPassword'] == $_POST['confirmPassword']) {
				$sql = "SELECT * FROM utilisateurs WHERE UTIL_MDP = '".sha1($_POST['oldPassword'])."' AND UTIL_ID = ".$_SESSION['id_user'];
				$res = mysql_query($sql);
				$n = mysql_num_rows($res);
				if ($n > 0){
					$sql = "UPDATE utilisateurs SET UTIL_MDP = '".sha1($_POST['newPassword'])."' WHERE UTIL_ID =".$_SESSION['id_user'];
					$res = mysql_query($sql);
					$_SESSION['message'] = "Mot de passe changer avec succes.";
				} else {
					$_SESSION['message'] = "L'ancien mot de passe saisie n'est pas correcte.";
				}
			}else{
				$_SESSION['message'] = "Mot de passe non identique.";
			}
		}else {
			$_SESSION['message'] = "Mot de passe ne doit pas être vide";
		}
	}
?>

<?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
<br/>
<div class="forgot-password">
    <h2 class="center">Modification du mot passe.</h2>

    <br/>

    <div class="content-center">
        <form action="#" method="post">
            <table>
                <tr>
                    <td><label>Ancien mot de passe:</label></td>
                    <td><input type="password" name="oldPassword"></td>
                </tr>
                <tr>
                    <td><label>Nouveau mot de passe:</label></td>
                    <td><input type="password" name="newPassword"></td>
                </tr>
                <tr>
                    <td><label>Confirmer mot de passe:</label></td>
                    <td><input type="password" name="confirmPassword"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="valider" value="valider"></td>
                </tr>
            </table>
        </form>
    </div>
</div>