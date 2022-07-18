<?php
session_start();
include('db/db.php');
$pass=md5($_POST['pass']);
$mail=$_POST['mail']; 
$sql=$db->query("SELECT * FROM tbl_employe inner join   tbl_utilisateur on tbl_employe.id_employe=tbl_utilisateur.id_employe where login='$mail' and password='$pass'");
if($sql->rowCount()==1){
   $user=$sql->fetch();
   $sql=$db->query("UPDATE tbl_utilisateur set connected=1 where login='$mail' and password='$pass'");

   $_SESSION['user']=$user;
   header('Location:index.php');
}
else{
  $_SESSION['error'] ="verifier votre identifiants" ;
  header('Location:login.php');
}
?>