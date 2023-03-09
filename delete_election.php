<?php
include "Election.php";
  $e = new CrudElection();
if(isset($_GET["id_election"])){
    $id = $_GET["id_election"];
   if  ($e->deleteParID($id)==1){
    header("location:crud_election.php");
   };
   }