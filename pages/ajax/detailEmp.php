<?php
include('../../db/db.php');
if(isset($_POST['ele'])){
  $el=$_POST['ele'];
  $sq=$db->query("SELECT * From tbl_employe inner join tbl_utilisateur on tbl_utilisateur.id_employe=tbl_employe.id_employe where tbl_employe.id_employe='$el' ")->fetch();
  
}
?>
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Information Employé
        </div>
        <div class="card-body">
         <label for="">Nom </label>:<b><?=$sq['nom_emp'] ?></b> <br> 
         <label for="">Prenom</label>:<b><?=$sq['prenom_emp'] ?></b> <br> 
         <label for="">Telephone</label>:<b><?=$sq['telephone_emp'] ?></b> <br> 
         <label for="">Email</label>:<b><?=$sq['email_emp'] ?></b> <br> 
         <label for="">CNI</label>:<b><?=$sq['cni'] ?></b> <br> 
         <label for="">Adresse</label>:<b><?=$sq['adresse_emp'] ?></b> <br> 
         <label for="">Sexe</label>:<b><?=$sq['sexe'] ?></b> <br> 
         <label for="">Date_naissance</label>:<b><?=$sq['date_naissance'] ?></b> <br> 
        </div>
        <div class="card-footer">
         
        </div>
    </div>

</div>

</div>
</div>
</div>


</div>