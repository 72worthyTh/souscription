 <!-- DataTales Example -->
 <?php 
include("db/db.php");
$sql=$db->query("SELECT * From tbl_souscription inner join tbl_client on tbl_souscription.id_client=tbl_client.id_client
inner join tbl_vehicule on tbl_vehicule.id_vehicule=tbl_souscription.id_vehicule where tbl_souscription.etat=0 order by tbl_souscription.id_souscription ");

?>




 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Souscription en attentes de validation</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Vehicule</th>
                                            <th>Marque Vehicule</th>
                                            <th>Date souscription</th>
                                            <th>Montant</th>
                                            <th>Periode</th>
                                            <th>Etat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                                    <?php while($row=$sql->fetch()){?>

                                                    <tr>
                                                    <td><?=$row['nom_cl']?><?=$row['prenom_cl']?></td>
                                                    <td><?=$row['plaque_veh']?></td>
                                                    <td><?=$row['marque_veh']?></td>
                                                    <td><?=$row['date']?></td>
                                                    <td><?=$row['montant']?></td>
                                                    <td><?=$row['periode']?></td>
                                                    <td> <?php if($row['etat']==0) echo "en Attente de validation"?></td>
                                                    <td>
        <a  class="nav-link" data-toggle="dropdown"  href="#">Actions</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item details" onclick="opendet('<?php echo$row['id_souscription']?>')"  data-toggle="modal" data-target="#detModal">
            <i class="fas fa-folder-open mr-2"></i> Détails
            <span class="float-right text-muted text-sm" onc> </span>
          </a>

          <div class="dropdown-divider"></div>
        <?php if($_SESSION['user']['role']==0||$_SESSION['user']['role']==1){?>
          <a href="app/actionSous.php?val=<?=$row['id_souscription']?>" class="dropdown-item ">
            <i class="fas fa-folder-open mr-2"></i> Valider
            <span class="float-right text-muted text-sm"> </span>
          </a>
        <?php }?>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="?pages=newsous&sous=<?=$row['id_souscription']?>" class="dropdown-item">
            <i class="fas fa-edit mr-2"  tabindex="-1"  ></i> Modifier
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="app/actionSous.php?sup=<?=$row['id_souscription']?>" class="dropdown-item">
            <i class="fas fa-trash mr-2"></i>Supprimer
            <span class="float-right text-muted text-sm"></span>
          </a>
        
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
            <div class="modal fade" id="detModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détail du souscription</h5>
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

 function opendet(el){
$.ajax({
  type: "POST",
  url: "pages/ajax/detailSous.php",
  data: {el:el},
  
  success: function (response) {
    $('#data').html(response);
  }
});

 }
    </script>