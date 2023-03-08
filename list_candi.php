<?php
include "header_admin.php";
include "Candidat.php";

$e = new CrudCandidat();
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID CANDIDAT</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">PHOTO</th>
      <th scope="col">SLOGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($res as $r){?>
    <tr>
      <td><?php echo $r["ID_Candidat"] ;?></td>
      <td><?php echo $r["Nom"] ;?></td>
      <td><?php echo $r["Prenom"] ;?></td>
      <td><?php echo $r["Photo"] ;?></td>
      <td><?php echo $r["Slogan"] ;?></td>
      <td> 
      <form method="get" action="delete_candidat.php">
        <input type="hidden" name="id" value="<?php echo $r["ID_Candidat"];?>">  
      <button type="submit"  class="btn btn-danger">
        supprimer</button></form></td>
        <td>
        <form method="POST" action="modifier_candidat.php">
        <input type="hidden" name="id" value="<?php echo $r["ID_Candidat"];?>"> 
        <input type="hidden" name="nom" value="<?php echo $r["Nom"];?>">  
        <input type="hidden" name="prenom" value="<?php echo $r["Prenom"];?>">  
        <input type="hidden" name="photo" value="<?php echo $r["Photo"];?>">
        <input type="hidden" name="slogan" value="<?php echo $r["Slogan"];?>"> 
     <button type="submit" name="submit" class="btn btn-primary">
        modifier</button></form>
        </td>
    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>
    
</body>
</html>