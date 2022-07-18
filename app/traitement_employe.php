<?php 
include('../db/db.php');

$id_emp=isset($_POST['id_emp'])?$_POST['id_emp']:0;
$nom_emp=$_POST['nom_emp'];
$prenom_emp=$_POST['prenom_emp'];
$telephone_emp=$_POST['telephone_emp'];
$CNI=$_POST['cni'];
$adresse_emp=$_POST['adresse_emp'];
$email_emp=$_POST['email_emp'];
$login_emp=$_POST['login_emp'];

$role=$_POST['role'];
$sexe=$_POST['sexe'];
$date_naissance=$_POST['date_naissance'];

if($id_emp==0){
$password=md5($_POST['password']);
$sql=$db->prepare("INSERT INTO tbl_employe( nom_emp, prenom_emp, telephone_emp, adresse_emp, cni, email_emp, date_naissance, sexe)
values(?,?,?,?,?,?,?,?)");
if($sql->execute([$nom_emp,$prenom_emp,$telephone_emp,$adresse_emp,$CNI,$email_emp,$date_naissance,$sexe])){
   $idemp=$db->lastInsertId(); 
    $sqlog=$db->prepare("INSERT INTO tbl_utilisateur( login, password, role, id_employe)
values(?,?,?,?)");
if($sqlog->execute([$login_emp,$password,$role,$idemp])){
    echo "Emproye bien ajoute";
}
else{
echo "Echéc d'enregistement";   
}
}
else{
    echo "Echéc d'enregistement";
    }
}
    else if($id_emp!=0){

        $sql=$db->prepare("UPDATE  tbl_employe set nom_emp=?, prenom_emp=?, telephone_emp=?, adresse_emp=?, cni=?, email_emp=?, date_naissance=?, sexe=? where id_employe=?");
        if($sql->execute([$nom_emp,$prenom_emp,$telephone_emp,$adresse_emp,$CNI,$email_emp,$date_naissance,$sexe,$id_emp])){ 
            
            $sqlog=$db->prepare("UPDATE tbl_utilisateur set login=?,  role=?where id_employe=?");
        if($sqlog->execute([$login_emp,$role,$id_emp])){
            echo "Emproye bien modifeir";
        }
        else{
        echo "Echéc de modification  kj";   
        }
        }
        else{
            echo "Echéc de modification l";
            }
    }
?>