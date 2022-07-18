<?php 
include('../../db/db.php');
$cli=$db->query('SELECT * from tbl_client order by id_client desc ');
while($r=$cli->fetch()){?>
<option value="<?php echo $r['id_client'] ?>"><?php echo $r['nom_cl'].''.$r['prenom_cl']?></option>
<?php } ?>