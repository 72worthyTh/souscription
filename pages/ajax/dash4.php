<?php
include('../../db/db.php');

  $sqa=$db->query("SELECT * From tbl_utilisateur where connected=1");
  echo $sqa->rowCount();
?>