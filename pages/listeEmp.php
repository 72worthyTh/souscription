 <!-- DataTales Example -->
<?php 
include("db/db.php");
$sql=$db->query("SELECT * From tbl_employe");

?>

 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Employes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Télephone</th>
                                            <th>CNI</th>
                                            <th>Adresse</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row=$sql->fetch()){?>

                                                    <tr>
                                                    <td><?=$row['nom_emp']?></td>
                                                    <td><?=$row['prenom_emp']?></td>
                                                    <td><?=$row['telephone_emp']?></td>
                                                    <td><?=$row['cni']?></td>
                                                    <td><?=$row['adresse_emp']?></td>
                                                    <td><?=$row['email_emp']?></td>
                                                    <td>
        <a  class="nav-link" data-toggle="dropdown"  href="#">Actions</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item details" onclick="opendempdata('<?php echo$row['id_employe']?>')"  data-toggle="modal" data-target="#modalEmp">
            <i class="fas fa-folder-open mr-2"></i> Détails
            <span class="float-right text-muted text-sm" onc> </span>
          </a>
          <?php if($_SESSION['user']['role']==0||$_SESSION['user']['role']==2){?>
          <div class="dropdown-divider"></div>
          <a href="?pages=editEmp&idemp=<?=$row['id_employe']?>" class="dropdown-item">
            <i class="fas fa-edit mr-2"  tabindex="-1"  ></i> Modifier
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="app/actionEmp.php?sup=<?=$row['id_employe']?>" class="dropdown-item">
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

              
                <!-- /.container-fluid -->

           
                <!-- /.container-fluid -->
                <div class="modal fade" id="modalEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détail Employé</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="data">
                <div class="row">
<div class="col-6"></div>



                </div>



                  
                </div> 
                <div class="modal-footer">
                   <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>--->
                </div>
            </div>
        </div>
    </div>
           
    <script>

function opendempdata(ele){
$.ajax({
  type: "POST",
  url: "pages/ajax/detailEmp.php",
  data: {ele:ele},
  
  success: function (hhh) {
    $('#data').html(hhh);
  }
});

 }
    </script>