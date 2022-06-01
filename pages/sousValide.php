 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Employes</h6>
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                                    <?php for($i=1;$i<15;$i++){?>

                                                    <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                    <td>en Attente de validation</td>
                                                    <td>
        <a  class="nav-link" data-toggle="dropdown"  href="#">Actions</a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Actions</span>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item details" onclick="openob('<?php echo $row['nomero_fact']?>')"  data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-folder-open mr-2"></i> Détails
            <span class="float-right text-muted text-sm" onc> </span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item details" onclick="openob('<?php echo $row['nomero_fact']?>')"  data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-folder-open mr-2"></i> Valider
            <span class="float-right text-muted text-sm"> </span>
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="?page=transport&action=editionmission&id=<?=$row['nomero_fact']?>" class="dropdown-item">
            <i class="fas fa-edit mr-2"  tabindex="-1"  ></i> Modifier
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
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

           