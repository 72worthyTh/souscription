<?php 
include('../../db/db.php');
$cli=$db->query('SELECT * from tbl_vehicule order by id_vehicule desc ');
while($r=$cli->fetch()){?>
<option value="<?php echo $r['id_vehicule'] ?>"><?php echo $r['plaque_veh']?></option>
<?php } ?>