<?php
session_start();
include('db/db.php');
$sql=$db->query("UPDATE tbl_utilisateur set connected=0 where id_employe='".$_SESSION['user']['id_employe']."'");
session_destroy();
header("location:login.php")
?>