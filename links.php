<?php
switch($page){
   case 'Soursciption':include('pages/souscription.php'); 
  break;
  case 'newsous':include('pages/souscription.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
  case 'newEmp':include('pages/newEmp.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
  case 'listeEmp':include('pages/listeEmp.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
  case 'sousEttente':include('pages/sousEttente.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
  case 'sousValide':include('pages/sousValide.php'); //echo "<script src='vues/lib/js/banque.js'></script>"; 
  break;
  default:
  include('pages/dash.php');
}
?>
