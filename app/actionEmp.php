<?php
include('../db/db.php');

  if(@$_GET['sup']){
    $sup=$_GET['sup'];
    $sql=$db->query("DELETE From  tbl_employe  where id_employe='$sup'");
    $sql2=$db->query("DELETE From  tbl_utilisateur  where id_employe='$sup'");
    header('location:http://localhost/souscription/index.php?pages=listeEmp');
  }
?>