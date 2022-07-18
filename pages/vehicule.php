 <!-- DataTales Example -->
 <?php 
include("db/db.php");
$sql=$db->query("SELECT * From tbl_vehicule");

?>

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Véhicules</h6>
                        </div>
                        <div class="card-body">
                        <button class=" input-group-text" style="float:right ;" type="button" data-toggle="modal" data-target="#my-veh">+Véhicule</button>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Plaque</th>
                                            <th>Modèle</th>
                                            <th>Moteur</th>
                                            <th>Marque</th>
                                            <th>Date fabrication</th>
                                            <th>Chassis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row=$sql->fetch()){?>

                                                    <tr>
                                                    <td><?=$row['plaque_veh']?></td>
                                                    <td><?=$row['modele_veh']?></td>
                                                    <td><?=$row['nomero_moteur']?></td>
                                                    <td><?=$row['marque_veh']?></td>
                                                    <td><?=$row['date_fabrication']?></td>
                                                    <td><?=$row['chassis']?></td>
                                                    
                                                    <td>
        <a  class="nav-link" data-toggle="dropdown"  href="#">Actions</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>

          
          <?php if($_SESSION['user']['role']==0||$_SESSION['user']['role']==2){?>
          <div class="dropdown-divider"></div>
          <a onclick="editveh('<?=$row['id_vehicule']?>',
          '<?=$row['plaque_veh']?>','<?=$row['marque_veh']?>',
          '<?=$row['chassis']?>','<?=$row['modele_veh']?>',
          '<?=$row['date_fabrication']?>','<?=$row['nomero_moteur']?>')" class="dropdown-item"data-toggle="modal" data-target="#my-veh">
            <i class="fas fa-edit mr-2"  tabindex="-1"  ></i> Modifier
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="app/actionveh.php?sup=<?=$row['id_vehicule']?>" class="dropdown-item">
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

              
              <!--modal vehicule-->
<form id="form_vehicule">
<div id="my-veh" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Ajout vehicule</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert messp" style="color:red"></div>
             <div class="row">
             <input type="hidden" name="idveh" id="p0">
<div class="col-md-6">
<div class="form-group">

  <label for="">Plaque*</label>
  <input type="text"
    class="form-control" name="plaque_veh" id="p1" aria-describedby="helpId" placeholder="">
</div>

<div class="form-group">
  <label for="">Marque*</label>
  <input type="text"
    class="form-control" name="marque_veh" id="p2" aria-describedby="helpId" placeholder="">
</div>

<div class="form-group">
  <label for="">Numero Chassis*</label>
  <input type="text"
    class="form-control" name="chassis" id="p3" aria-describedby="helpId" placeholder="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="">Modele*</label>
  <input type="text"
    class="form-control" name="modele_veh" id="p4" aria-describedby="helpId" placeholder="">
</div>


<div class="form-group">
  <label for="">Date de Fabrication*</label>
  <input type="date"
    class="form-control" name="date_fabrication" id="p5" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">Numéro moteur*</label>
  <input type="text"
    class="form-control" name="numero_moteur" id="p6" aria-describedby="helpId" placeholder="">
</div>

</div>
<button type="button" name="" onclick="savevehicule()" id="svcl" class="btn btn-primary" btn-lg btn-block">Enregistrer</button>

</div>


             </div>



            </div>
        </div>
    </div>
 
    <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
</form>
           
    <script>



function savevehicule(){
  if($("#p1").val()==""||$("#p2").val()==""||$("#p3").val()==""||$("#p4").val()==""||$("#p5").val()=="" ||$("#p6").val()==""){

   $(".messp").html("Tous les champs avec * sont obligatoires")


}
else{
  var fmdata=$("#form_vehicule").serialize();
  $.ajax({
    type: "POST",
    url: "app/traitementvehicule.php",
    data:fmdata ,
    success: function (response) {
      alert(response);
      getvehicule();
    }
  });
}}


function editveh(a1,a2,a3,a4,a5,a6,a7){
    $('#p0').val(a1);
    $('#p1').val(a2);
    $('#p2').val(a3);
    $('#p3').val(a4);
    $('#p4').val(a5);
    $('#p5').val(a6);
    $('#p6').val(a7);
   
    $('#svcl').html('Modifier');
    $('#my-modal-title').html('Modification Véhicule');
  

 }
    </script>