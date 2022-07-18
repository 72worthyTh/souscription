 <!-- DataTales Example -->
 <?php 
include("../../db/db.php");
$sql=$db->query("SELECT * From tbl_souscription inner join tbl_client on tbl_souscription.id_client=tbl_client.id_client
inner join tbl_vehicule on tbl_vehicule.id_vehicule=tbl_souscription.id_vehicule where tbl_souscription.etat=0 order by date Asc");

?>




 
                                                    <?php while($row=$sql->fetch()){?>

                                                   
                                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="small text-gray-500"><?=$row['date']?></div>
                                        <span class="font-weight-bold">nouvelle souscription en provenance de:<i><?=$row['nom_cl']?><?=$row['prenom_cl']?></i> </span>

                                        </div>
                                        
                                   
                                </a>
                                       
              
               <?php }?>