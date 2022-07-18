<?php 
include('db/db.php');
if(isset($_GET['sous'])){
  $sous=$_GET['sous'];
  $sql=$db->query("SELECT * From tbl_souscription inner join tbl_client on tbl_souscription.id_client=tbl_client.id_client
  inner join tbl_vehicule on tbl_vehicule.id_vehicule=tbl_souscription.id_vehicule where tbl_souscription.etat=0 and id_souscription='$sous' ")->fetch();
  
}
?>



<form id="form_souscription">
<div class="card">
    <div class="card-header">
    Nouvelle Souscription
    </div>
    <div class="card-body">
        <div class="alert mess1" style="color:red"></div>
  <input type="hidden" name="id_souscr" value="<?php echo $sous ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="">Vehicule*</label>
<div class="input-group">
<select class="form-control" id="vehicule" type="text" name="id_vehicule" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
<option value="">Select....</option>
<?php 
$cli=$db->query('SELECT * from tbl_vehicule order by id_vehicule desc ');
while($r=$cli->fetch()){?>
<option <?php if($r['id_vehicule']== @$sql['id_vehicule']) echo 'selected'?>  value="<?php echo $r['id_vehicule'] ?>"><?php echo $r['plaque_veh']?></option>
<?php } ?>
</select>
<div class="input-group-append">
<span class=" input-group-text" type="button" data-toggle="modal" data-target="#my-veh">+</span>
</div>
</div>
</div>
<div class="form-group">
<label for="">Client*</label>
<div class="input-group">
<select class="form-control" id="client" type="text" name="id_client" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
<option value="">Select....</option>
<?php 
$cli=$db->query('SELECT * from tbl_client order by id_client desc ');
while($r=$cli->fetch()){?>
<option <?php if(@$r['id_client']== @$sql['id_client']) echo 'selected'?> value="<?php echo $r['id_client'] ?>"><?php echo $r['nom_cl'].''.$r['prenom_cl']?></option>
<?php } ?>
</select>
<div class="input-group-append">
<span class=" input-group-text" type="button" data-toggle="modal" data-target="#my-client">+</span>
</div>
</div>
</div>
<div class="form-group">
<label for="">Date souscription*</label>
<div class="input-group">
<input class="form-control" value="<?php echo @$sql['date'] ?>"  type="date" id="date" name="date" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
<div class="input-group-append">

</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Montant *</label>
<div class="input-group">
<input class="form-control" value="<?php echo @$sql['montant'] ?>" type="number" name="montant" id="montant" placeholder="montant" aria-label="Recipient's " aria-describedby="my-addon">
<div class="input-group-append">

</div>
</div>
</div>


<div class="form-group">
<label for="">Période(nombre de mois)*</label>

<div class="input-group">
<input class="form-control" value="<?php echo @$sql['periode'] ?>" id="periode" type="number" name="periode" placeholder="periode" aria-label="Recipient's " aria-describedby="my-addon">
<div class="input-group-append">
</div>
</div>
</div>
</div>
</div>


    </div>
    <div class="card-footer">
    <button type="button" name="" onclick="savesous()" id="" class="btn btn-primary" btn-lg btn-block"> <?php if(isset($_GET['sous'])) echo 'Modifier'; else echo 'Enregistrer';?></button>
    </div>
</div>
</form>
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
    class="form-control" name="telephone_cl" id="" aria-describedby="helpId" placeholder="">
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
    class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
</div>
</div>

</div>
<button type="button" onclick="saveclient()" name="" id="" class="btn btn-primary" btn-lg btn-block">Enregistrer</button>

</div>


        </div>



        </div>
        </div>
    </div>
</div>
</form>


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
    class="form-control" name="numero_moteur" id="p6" aria-describedby="helpId" placeholder="numéro moteur">
</div>

</div>
<button type="button" name="" onclick="savevehicule()" id="" class="btn btn-primary" btn-lg btn-block">Enregistrer</button>

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
getclient();
getvehicule();
function getclient(){
var va="b"
//alert(va)
$.ajax({
  method:"POST",
  url: "pages/ajax/loadclient.php",
  data:{va:va},
  success: function (data) {
    alert(data)
  $('#client').html(data);
  },
  error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
       alert(msg);
    }
});
}
function getvehicule(){
  var ba='v';
  //alert(ba);
$.ajax({
  method: "POST",
  url: "pages/ajax/loadvehicule.php",
  data:{ba:ba},
  success: function (data) {
    $('#vehicule').html(data);
  }
});
}
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

function savesous(){

if($("#vehicule").val()==""||$("#client").val()==""||$("#date").val()==""||$("#montant").val()==""||$("#periode").val()==""){
 
   $(".mess1").html("Tous les champs avec * sont obligatoires")


}
else{

  var fmdata=$("#form_souscription").serialize();
  $.ajax({
    type: "POST",
    url: "app/traimentsouscription.php",
    data:fmdata ,
    success: function (response) {
      alert(response);
      getvehicule();
    },
    error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
       alert(msg);
    }
  });
}
}

</script>
             
          
