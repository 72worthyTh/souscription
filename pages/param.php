<?php
    include 'db/db.php';
    
    if (isset($_POST['editPassword'])) {
        $user_id=$_SESSION['user']['id_utilisateur'];
        $mail=$_POST['admin_email'];
        $ancienPassword=$_POST['admin_password1'];
        $nouveauPassword=$_POST['admin_password2'];
        $nouveauPasswordConfirm=$_POST['admin_password3'];
        $req1="SELECT * FROM tbl_utilisateur WHERE login='$mail' and id_utilisateur='$user_id'";
        $res1=$db->query($req1);
        $result=$res1->fetch();
        $password=$result['password'];
        $admin_email=$result['login'];
        $message='';
        if ($mail!=$admin_email) {
            $message.="Erreur dans nom d'utilisateur<br>";
        }elseif (md5($ancienPassword)!=$password) {
            $message.='Erreur dans votre ancien mot de passe<br>';
        }elseif ($nouveauPassword!=$nouveauPasswordConfirm) {
            $message.='Erreur nouveau mot de passe et<br> different de mot de passe confirmé';
        }
        
        if ($message=='') {
            $p=md5($nouveauPasswordConfirm);
            $query="UPDATE tbl_utilisateur set password='$p' WHERE login='$mail' and id_utilisateur='$user_id' ";
            $res= $db->prepare($query)->execute();
            echo '<script>alert("Mot de passe modifié")</script>';
            echo '<script type="text/javascript">';
            echo 'window.location.href="?pages=param";';
            echo '</script>';

        }elseif ($message!='') {
            echo'<center><h3 style="color:red;">'.$message.'</h3></center><br><br><center><button class="btn btn-secondary"><a href="?page=parametres&action=editPassword" style="color:white">OK</a></button></center>';
        }
    }
    
   // echo 'BD '.$password.'<br>'.'Ancien '.$ancienPassword.'<br>'.'NV '.$nouveauPassword.'<br>'.'CNV '.$nouveauPasswordConfirm;
?>







<div class="card">
    <div class="card-header">
        Modification du mot de passe
    </div>
    <div class="card-body">
      



<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="admin_email">nom d'utilisateur(login)</label>
      <input type="text" class="form-control" name="admin_email" id="admin_email" placeholder="example@gmail.com">
    </div>
    <div class="form-group col-md-6">
      <label for="admin_password1">Ancien mot de passe</label>
      <input type="password" class="form-control" name="admin_password1" id="admin_password1" placeholder="Ancien mot de passe">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="admin_password2">Nouveau mot de passe</label>
      <input type="password" class="form-control" name="admin_password2" id="admin_password2" placeholder="Nouveau mot de passe">
    </div>
    <div class="form-group col-md-6">
      <label for="admin_password3">Confirmé le nouveau mot de passe</label>
      <input type="password" class="form-control" name="admin_password3" id="admin_password3" placeholder="mot de passe">
    </div>
  </div>

    <center><button type="submit" name="editPassword" class="btn btn-primary">Modifier</button></center>
  
</form>

    </div>
    <div class="card-footer">
     
    </div>
</div>