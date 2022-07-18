<?php
include('../../db/db.php');
if(isset($_POST['el'])){
  $el=$_POST['el'];
  $sq=$db->query("SELECT * From tbl_souscription inner join tbl_client on tbl_souscription.id_client=tbl_client.id_client
  inner join tbl_vehicule on tbl_vehicule.id_vehicule=tbl_souscription.id_vehicule where id_souscription='$el' ")->fetch();
  
}
?>
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
Souscription
    </div>
    <div class="card-body">
         <label for="">Date_souscription </label>:<b><?=$sq['date'] ?></b> &nbsp;&nbsp;&nbsp;&nbsp;
         <label for="">Montant</label>:<b><?=$sq['montant'] ?></b> <br> 
         <label for="">Periode</label>:<b><?=$sq['periode'] ?></b> &nbsp;&nbsp;&nbsp;&nbsp; 
         <label for="">Etat</label>:<b><?php if($sq['etat']==1) echo 'validée'; else echo 'En attante de validation' ?></b> <br> 
         
     
       
    </div>

</div>

</div>
<div class="col-6">
    <div class="card">
        <div class="card-header">
            Information Client
        </div>
        <div class="card-body">
         <label for="">Nom </label>:<b><?=$sq['nom_cl'] ?></b> <br> 
         <label for="">Prenom</label>:<b><?=$sq['prenom_cl'] ?></b> <br> 
         <label for="">Telephone</label>:<b><?=$sq['telephone_cl'] ?></b> <br> 
         <label for="">Email</label>:<b><?=$sq['email'] ?></b> <br> 
         <label for="">CNI</label>:<b><?=$sq['CNI'] ?></b> <br> 
         <label for="">Adresse</label>:<b><?=$sq['adresse'] ?></b> <br> 
         <label for="">Sexe</label>:<b><?=$sq['sexe'] ?></b> <br> 
         <label for="">Date_naissance</label>:<b><?=$sq['date_naissance'] ?></b> <br> 
        </div>
        <div class="card-footer">
         
        </div>
    </div>

</div>
<div class="col-6">
<div class="card">
    <div class="card-header">
        Information vehicule
    </div>
    <div class="card-body">
    <label for="">Plaque </label>:<b><?=$sq['plaque_veh'] ?></b> <br> 
         <label for="">Marque</label>:<b><?=$sq['marque_veh'] ?></b> <br> 
         <label for="">Chassis</label>:<b><?=$sq['chassis'] ?></b> <br> 
         <label for="">Modèle</label>:<b><?=$sq['modele_veh'] ?></b> <br> 
         <label for="">N° Moteur</label>:<b><?=$sq['nomero_moteur'] ?></b> <br> 
         <label for="">Date Fabrication</label>:<b><?=$sq['date_fabrication'] ?></b> <br> 
         <br> <br> <br> 
    </div>
    <div class="card-footer">
   
    </div>
</div>
</div>
</div>


</div>