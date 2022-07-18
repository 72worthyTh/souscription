<?php
include('../db/db.php');

  if(@$_GET['sup']){
    $sup=$_GET['sup'];
    $sql=$db->query("DELETE From  tbl_vehicule  where id_vehicule='$sup'");

    header('location:http://localhost/souscription/index.php?pages=veh');
  }
?>