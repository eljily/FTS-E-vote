<?php 
  include "header_admin.php";
  include "participation_candidat.php";
  $e = new Participe_candidat();
  if(isset($_POST["submit"])){
    $id_election = $_POST["id_election"];
  }
  if(isset($_POST["affecter"])){
    $id_candidat = $_POST["id_candidat"];
    $id_election=$_POST["id_election"];
   // if($e->isParticiped($id_election,$id_candidat)){
     // header("location:affect_candidat.php?erreur=deja affecter");
    //}
  
      if($e->setParticipation($id_candidat,$id_election)){
        header("location: index.php");
      }
    
  }


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>AFFECTATION</title>
</head>
<body>
  <p><br><p></p><br></p>
  
    <form method="post" action="">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">id_candidat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_candidat" id="inputEmail3" placeholder="id_candidat_1">
    </div>
  </div>
  <input type="hidden" name="id_election" value="<?=@$id_election?>">
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="affecter" class="btn btn-primary">AFFECTE</button>
    </div>
  </div>
</form>
    
</body>
</html>