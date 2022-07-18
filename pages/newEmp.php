<div class="card">
    <div class="card-header">
    Nouveau Employé
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
   <form id="form_emp">

<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="">Nom</label>
<div class="input-group">
<input class="form-control" type="text" name="nom_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
</div>
<div class="form-group">
<label for="">Prénom</label>
<div class="input-group">
<input class="form-control" type="text" name="prenom_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
</div>
<div class="form-group">
<label for="">Date naissance</label>
<div class="input-group">
<input class="form-control" type="date" name="date_naissance" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
</div>
<div class="form-group">
<label for="">Sexe</label>
<select id="my-select" class="form-control" name="sexe">
      <option></option>
        <option>Masculin</option>
        <option>Fiminin</option>
    </select>
</div>
<div class="form-group">
<label for="">Password</label>
<div class="input-group">
<input class="form-control" type="password" name="password" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="">Telephone </label>
<div class="input-group">
<input class="form-control" type="tel" name="telephone_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">
</div>
</div>


<div class="form-group">
<label for="">CNI</label><br>
<div class="input-group">
<input class="form-control" type="text" name="cni" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">
<div class="input-group-append">
</div>
</div>
</div>

<div class="form-group">
<label for="">Adresse</label>
<div class="input-group">
<input class="form-control" type="text" name="adresse_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
<div class="form-group">
<label for="">Email</label>
<div class="input-group">
<input class="form-control" type="text" name="email_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
<div class="form-group">
<label for="">Role</label>
<div class="input-group">
<select name="role" id="" class="form-control">
<option value="0">Admin</option>
<option value="1">Personnel SOCABU</option>
<option value="2">Personnel RNP</option>
</select>
</div>
<div class="form-group">
<label for="">login(nom d'utilisateur)</label>
<div class="input-group">
<input class="form-control" type="text" name="login_emp" placeholder="" aria-label="Recipient's " aria-describedby="my-addon">

</div>
</div>


</div>
</div>

<button type="button" onclick="saveemp()" name="" id="" class="btn btn-primary" btn-lg btn-block">Enregistrer</button>
</form>
    </div>
   
</div>
<script>

function saveemp(){
 // alert('boom5')
  var fmdata=$("#form_emp").serialize();
  $.ajax({
    type: "POST",
    url: "app/traitement_employe.php",
    data:fmdata ,
    success: function (response) {
      alert(response);
      //getvehicule();
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

</script>