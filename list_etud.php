<?php include "Etudiant.php";
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
    <header>
         <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active"><a href="index.php?logout=lout">
          <button class="btn btn-danger">
        LOG OUT</button></a>
          </li>
          <li class="nav-item">
          <form method="get" action="">
    <input class="form-control mr-sm-2" type="search" value="<?=@$mc ?>" name="mc" placeholder="Search" aria-label="Search">
    
          </li>
          <li class="nav-item">
          <button type="submit" name="submit" class="btn btn-primary">
        CHERCHER</button>

         <!-- <input type="submit" name="submit" value="chercher"> -->
  </form>
  <li class="nav-item"><b>
<?php 
session_start();

if(!isset($_SESSION["email"])){
    header("location:index.php");
    exit();
}

if(isset($_SESSION["email"])){ echo $_SESSION["email"];} ?></b>
</li>
</nav>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

    </header>
<p></br></br></p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">matricule</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">Filier</th>
      <th scope="col">tel</th>
      <th scope="col">Email</th>
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
      
    </tr>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>

