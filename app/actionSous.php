<?php
include('../db/db.php');
if(@$_GET['val']){
    $val=$_GET['val'];
    $sql=$db->query("UPDATE  tbl_souscription set etat=1 where id_souscription='$val'");
    header('location:http://localhost/souscription/index.php?pages=sousEttente');
  }
  if(@$_GET['sup']){
    $sup=$_GET['sup'];
    $sql=$db->query("DELETE From  tbl_souscription  where id_souscription='$sup'");
    header('location:http://localhost/souscription/index.php?pages=sousEttente');
  }
?>