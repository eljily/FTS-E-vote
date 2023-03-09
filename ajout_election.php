<?php
include "header_admin.php";
include "Election.php";
if(isset($_POST["submit"])){
    //collection des data
    $id_election = $_POST['id'];
    $nom = $_POST['nom']; 
    $date_debut = $_POST['date_debut']; 
    $date_fin = $_POST['date_fin'];  
   //traitement :
    $e = new Election($id_election,$nom,$date_debut,$date_fin);

    if(($e->verifierUniques($id_election))){
      header("location:ajout_election.php?error=ETUDIANT DEJA INSCRIT :)");
    }
    else{
    $e->setElection($id_election,$nom,$date_debut,$date_fin);
    header("location:ajout_election.php?error=ok");
    }}


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
    <p><br><br><br></p>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

            <form class="mx-1 mx-md-4" method="post" action="">

            <?php if(isset($_GET['error'])){$error = $_GET['error'] ;?>
              <?php if($error == "ok"){?>
                <div class="alert alert-success" role="alert">
              <?php
              echo "EST AJOUTER AVEC SUCCES" ;}
              else{?>
            </div>

            <div class="alert alert-danger" role="alert">
              <?php
              echo $error ;}}?>
            </div>


                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" name="id" 
                      minlength="4" maxlength="6" class="form-control" />
                      <label class="form-label" for="form3Example1c">ID_Election</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" name="nom" class="form-control" />
                      <label class="form-label" for="form3Example1c">NOM</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="date" id="form3Example1c" name="date_debut" class="form-control" />
                      <label class="form-label" for="form3Example1c">DATE_DEBUT</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="date" id="form3Example3c" name="date_fin" class="form-control" />
                      <label class="form-label" for="form3Example3c">DATE_FIN</label>
                    </div>
                  </div>

               
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">AJOUTER</button>
                  </div>
                </form>
              </div>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>







</body>
</html>