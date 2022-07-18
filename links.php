<?php
switch($page){
   case 'Soursciption':include('pages/souscription.php'); 
  break;
  case 'newsous':include('pages/souscription.php'); 
  break;
  case 'newEmp':include('pages/newEmp.php'); 
  break;
  case 'editEmp':include('pages/editEmp.php'); 
  break;
  case 'param':include('pages/param.php'); 
  break;
  case 'listeEmp':include('pages/listeEmp.php'); 
  break;
  case 'sousEttente':include('pages/sousEttente.php'); 
  break;
  case 'sousValide':include('pages/sousValide.php'); 
  break;
  case 'cl':include('pages/client.php'); 
  break;
  case 'veh':include('pages/vehicule.php'); 
  break;
  default:
  include('pages/dash.php');
}
?>
