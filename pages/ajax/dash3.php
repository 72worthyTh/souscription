<?php
include('../../db/db.php');

  $sqa=$db->query("SELECT * From tbl_employe");
  echo $sqa->rowCount();
?>