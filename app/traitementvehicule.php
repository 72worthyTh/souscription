<?php 
include('../db/db.php');

$idveh=isset($_POST['idveh'])?$_POST['idveh']:0;
$plaque_veh=$_POST['plaque_veh'];
$marque_veh=$_POST['marque_veh'];
$chassis=$_POST['chassis'];
$modele_veh=$_POST['modele_veh'];
$nomero_moteur=$_POST['numero_moteur'];
$date_fabrication=$_POST['date_fabrication'];
if($idveh==0){
$sql=$db->prepare("INSERT INTO  tbl_vehicule (  plaque_veh ,  marque_veh ,  chassis ,  modele_veh ,  nomero_moteur ,  date_fabrication )
values(?,?,?,?,?,?)");
if($sql->execute([$plaque_veh,$marque_veh,$chassis,$modele_veh,$nomero_moteur,$date_fabrication])){
echo "Vehicule bien ajoute";
}
else{
    echo "Echec d'enregistement";
    }
}
else if($idveh!=0){
    $sql=$db->prepare("UPDATE  tbl_vehicule set plaque_veh=? ,  marque_veh=? ,  chassis=? ,  modele_veh=? ,  nomero_moteur=? ,  date_fabrication=? 
    where id_vehicule=?");
    if($sql->execute([$plaque_veh,$marque_veh,$chassis,$modele_veh,$nomero_moteur,$date_fabrication,$idveh])){
    echo "Véhicule bien modifier";
    }
    else{
        echo "Echec de modification";
        }

}
?>