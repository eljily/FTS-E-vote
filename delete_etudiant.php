<?php
include "Etudiant.php";
  $e = new CrudEtudiant();
if(isset($_GET["id"])){
    $id = $_GET["id"];
   if  ($e->deleteParID($id)==1){
    header("location:admin_dashbord.php");
   };
   }