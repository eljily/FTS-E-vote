
<?php include "Etudiant.php";
include "header_admin.php";

$e = new CrudEtudiant();
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
    <title>ADMIN_DASHBORD</title>
</head>
<body>
<p><br><br></p>
<p><br></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">matricule</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">Filier</th>
      <th scope="col">tel</th>
      <th scope="col">Email</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($res as $r){?>
    <tr>
      <td><?php echo $r["Matricule"] ;?></td>
      <td><?php echo $r["Nom"] ;?></td>
      <td><?php echo $r["Prenom"] ;?></td>
      <td><?php echo $r["Filiere"] ;?></td>
      <td><?php echo $r["Telephone"] ;?></td>
      <td><?php echo $r["Email"] ;?></td>
      <td> 
      <form method="get" action="delete_etudiant.php">
        <input type="hidden" name="id" value="<?php echo $r["Matricule"];?>">  
      <button type="submit"  class="btn btn-danger">
        supprimer</button></form></td>
        <td>
        <form method="POST" action="modifier_etudiant.php">
        <input type="hidden" name="matricule" value="<?php echo $r["Matricule"];?>"> 
        <input type="hidden" name="nom" value="<?php echo $r["Nom"];?>">  
        <input type="hidden" name="prenom" value="<?php echo $r["Prenom"];?>">  
        <input type="hidden" name="filiere" value="<?php echo $r["Filiere"];?>">  
        <input type="hidden" name="tel" value="<?php echo $r["Telephone"];?>">  
        <input type="hidden" name="email" value="<?php echo $r["Email"];?>">  
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

