<?php 
include('../db/db.php');
$idcl=isset($_POST['idcl'])?$_POST['idcl']:0;
$nom_cl=$_POST['nom_cl'];
$prenom_cl=$_POST['prenom_cl'];
$telephone_cl=$_POST['telephone_cl'];
$CNI=$_POST['CNI'];
$adresse=$_POST['adresse'];
$sexe=$_POST['sexe'];
$email=$_POST['email'];
$date_naissance=$_POST['date_naissance'];

if($idcl==0){
$sql=$db->prepare("INSERT INTO tbl_client( nom_cl, prenom_cl, telephone_cl, CNI, adresse, sexe, email, date_naissance)
values(?,?,?,?,?,?,?,?)");
if($sql->execute([$nom_cl,$prenom_cl,$telephone_cl,$CNI,$adresse,$sexe,$email,$date_naissance])){
echo "Client bien ajoute";
}
else{
    echo "Echec d'enregistement";
    }
}
else if($idcl!=0){
    $sql=$db->prepare("UPDATE tbl_client set nom_cl=?, prenom_cl=?, telephone_cl=?, CNI=?, adresse=?, sexe=?, email=?, date_naissance=?
    where id_client=?");
    if($sql->execute([$nom_cl,$prenom_cl,$telephone_cl,$CNI,$adresse,$sexe,$email,$date_naissance,$idcl])){
    echo "Client bien modifier";
    }
    else{
        echo "Echec de modification";
        }   
}
?>