<?php 
include('../db/db.php');
$id_souscr=isset($_POST['id_souscr'])?$_POST['id_souscr']:0;
$id_vehicule=$_POST['id_vehicule'];
$id_client=$_POST['id_client'];
$date=$_POST['date'];
$montant=$_POST['montant'];
$periode=$_POST['periode'];
if($id_souscr==0){
$sql=$db->prepare("INSERT INTO  tbl_souscription ( id_vehicule ,  id_client ,  date ,  montant ,  periode )
values(?,?,?,?,?)");
if($sql->execute([$id_vehicule,$id_client,$date,$montant,$periode])){
echo "Souscription bien ajoutée en attente de validation ";
}
else{
    echo "Echec d'enregistement";
    }
}
else if($id_souscr!=0){
    $sql=$db->prepare("UPDATE  tbl_souscription set id_vehicule=? ,  id_client=? ,  date=? ,  montant=? ,  periode=? where id_souscription=?");
    if($sql->execute([$id_vehicule,$id_client,$date,$montant,$periode,$id_souscr])){
    echo "Souscription bien ajoutée en attente de validation ";
    }
    else{
        echo "Echec d'enregistement";
        }
    }   

?>