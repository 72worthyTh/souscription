<?php
include('../../db/db.php');

  $sqg=$db->query("SELECT * From tbl_souscription inner join tbl_client on tbl_souscription.id_client=tbl_client.id_client
  inner join tbl_vehicule on tbl_vehicule.id_vehicule=tbl_souscription.id_vehicule where etat=1 ");
  echo $sqg->rowCount();

?>