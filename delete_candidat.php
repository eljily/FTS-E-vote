<?php
include "Candidat.php";
  $e = new CrudCandidat();
if(isset($_GET["id"])){
    $id = $_GET["id"];
   if  ($e->deleteParID($id)==1){
    header("location:list_candi.php");
   };
   }