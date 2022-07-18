<?php
include('../db/db.php');

  if(@$_GET['sup']){
    $sup=$_GET['sup'];
    $sql=$db->query("DELETE From  tbl_client  where id_client='$sup'");
    header('location:http://localhost/souscription/index.php?pages=cl');
  }
?>