 <!-- DataTales Example -->
 <?php 
include("db/db.php");
$sql=$db->query("SELECT * From tbl_client");

?>

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Clients</h6>
                        </div>
                        <div class="card-body">
                        <button style="float:right ;" class=" input-group-text" type="button" data-toggle="modal" data-target="#my-client">+Client</button>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>CNI</th>   
                                        <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Télephone</th>
                                            <th>Adresse</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row=$sql->fetch()){?>

                                                    <tr>
                                                    <td><?=$row['CNI']?></td>
                                                    <td><?=$row['nom_cl']?></td>
                                                    <td><?=$row['prenom_cl']?></td>
                                                    <td><?=$row['telephone_cl']?></td>
                                                   
                                                    <td><?=$row['adresse']?></td>
                                                    <td><?=$row['email']?></td>
                                                    <td>
        <a  class="nav-link" data-toggle="dropdown"  href="#">Actions</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>

         
          </a>
          <?php if($_SESSION['user']['role']==0||$_SESSION['user']['role']==2){?>
          <div class="dropdown-divider"></div>
          <a onclick="editCl(
            '<?=$row['id_client']?>','<?=$row['nom_cl']?>'
          ,'<?=$row['prenom_cl']?>','<?=$row['telephone_cl']?>'
          ,'<?=$row['CNI']?>','<?=$row['sexe']?>'
          ,'<?=$row['date_naissance']?>','<?=$row['adresse']?>'
          ,'<?=$row['email']?>')" class="dropdown-item" data-toggle="modal" data-target="#my-client">
            <i class="fas fa-edit mr-2"  tabindex="-1"  ></i> Modifier
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="app/actionclient.php?sup=<?=$row['id_client']?>" class="dropdown-item">
            <i class="fas fa-trash mr-2"></i>Supprimer
            <span class="float-right text-muted text-sm"></span>
          </a>
        <?php }?>
        </div>



                                                    </td>
                                                    </tr>
                                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

              
                <!--modal client-->
<form id="form_client">
<div id="my-client" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Ajout Client</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert messcl" style="color:red"></div>
        <div class="row">
       
<div class="col-md-6">
<div class="form-group">
    <input type="hidden" name="idcl" id="v0">
  <label for="">Nom*</label>
  <input type="text"
    class="form-control" name="nom_cl" id="v1" aria-describedby="helpId" placeholder="">
</div>

<div class="form-group">
  <label for="">Prénom*</label>
  <input type="text"
    class="form-control" name="prenom_cl" id="v2" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">Téléphone</label>
  <input type="text"
    class="form-control" name="telephone_cl" id="vx" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">CNI*</label>
  <input type="text"
    class="form-control" name="CNI" id="v3" aria-describedby="helpId" placeholder="">
</div></div>
<div class="col-md-6">
<div class="form-group">
  <label for="">Sexe*</label>
  <input type="text"
    class="form-control" name="sexe" id="v4" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">Date naissance*</label>
  <input type="date"
    class="form-control" name="date_naissance" id="v5" aria-describedby="helpId" placeholder="">
</div>

<div class="form-group">
  <label for="">Adresse*</label>
  <input type="text"
    class="form-control" name="adresse" id="v6" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">Email</label>
  <input type="text"
    class="form-control" name="email" id="v7" aria-describedby="helpId" placeholder="">
</div>
</div>

</div>
<button type="button" onclick="saveclient()" name="" id="svcl" class="btn btn-primary" btn-lg btn-block">Enregistrer</button>

</div>


        </div>



        </div>
        </div>
    </div>
</div>
</form>


           
    <script>

function saveclient(){
  if($("#v1").val()==""||$("#v2").val()==""||$("#v3").val()==""||$("#v4").val()==""||$("#v5").val()=="" ||$("#v6").val()==""){

   $(".messcl").html("Tous les champs avec * sont obligatoires")


}
else{
  var fmdata=$("#form_client").serialize();
  $.ajax({
    type: "POST",
    url: "app/traitementClient.php",
    data:fmdata ,
    success: function (response) {
      alert(response);
      getclient();
    }
  });
}}
 function editCl(a1,a2,a3,a4,a5,a6,a7,a8,a9){
    $('#v0').val(a1);
    $('#v1').val(a2);
    $('#v2').val(a3);
    $('#vx').val(a4);
    $('#v3').val(a5);
    $('#v4').val(a6);
    $('#v5').val(a7);
    $('#v6').val(a8);
    $('#v7').val(a9);
    $('#svcl').html('Modifier');
    $('#my-modal-title').html('Modification Client');
  

 }



    </script>