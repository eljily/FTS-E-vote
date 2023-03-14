<?php include "Election.php";
include "header_admin.php";
$e = new CrudElection();
$res = $e->getAll();
if(isset($_GET['submit'])){
    $mc = $_GET['mc'];
    $res=$e->getParmc($mc);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>



<p><br><br></p>
<p><br></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID_Election</th>
      <th scope="col">Nom</th>
      <th scope="col">Date_debut</th>
      <th scope="col">Date_fin</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($res as $r){?>
    <tr>
      <td><?php echo $r["ID_Election"] ;?></td>
      <td><?php echo $r["Nom"] ;?></td>
      <td><?php echo $r["Date_Debut"] ;?></td>
      <td><?php echo $r["Date_Fin"] ;?></td>
      
      <td> 
      <form method="get" action="delete_election.php">
        <input type="hidden" name="id_election" value="<?php echo $r["ID_Election"];?>">  
      <button type="submit"  class="btn btn-danger">
        supprimer</button></form></td>
        <td>
        <form method="POST" action="modifier_election.php">
        <input type="hidden" name="id_election" value="<?php echo $r["ID_Election"];?>"> 
        <input type="hidden" name="nom" value="<?php echo $r["Nom"];?>">  
        <input type="hidden" name="date_debut" value="<?php echo $r["Date_Debut"];?>">  
        <input type="hidden" name="date_fin" value="<?php echo $r["Date_Fin"];?>">  
  
     <button type="submit" name="submit" class="btn btn-primary">
        modifier</button></form>
        </td>

        <td>
        <form method="POST" action="affect_candidat.php">
        <input type="hidden" name="id_election" value="<?php echo $r["ID_Election"];?>">  
        
        <button type="submit" name="submit" class="btn btn-primary">
        AFFECT DES CANDIDATS</button></form>
        </td>
    
    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>


    
</body>
</html>