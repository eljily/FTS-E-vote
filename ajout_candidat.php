<?php
include "Candidat.php";
include "header_admin.php";
if(isset($_POST["submit"])){
    //collection des data
    $id = $_POST['id'];
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $photo = $_POST['photo']; 
    $slogan = $_POST['slogan']; 


   //traitement :
    $e = new Candidat($id,$nom,$prenom,$photo,$slogan);

    if(($e->verifierUniques($id))){
      header("location:ajout_candidat.php?error=ETUDIANT DEJA INSCRIT :)");
    }
    else{
    $e->setCandidat($id,$nom,$prenom,$photo,$slogan);
    header("location:ajout_candidat.php?error=ok");
    }}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>Ajout_Candidat</title>
</head>
<body>
<P><br></P>
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
                      <label class="form-label" for="form3Example1c">ID_CANDIDAT</label>
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
                      <input required type="text" id="form3Example1c" name="prenom" class="form-control" />
                      <label class="form-label" for="form3Example1c">PRENOM</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="file" id="form3Example3c" name="photo" class="form-control" />
                      <label class="form-label" for="form3Example3c">AJOUTER PHOTO</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" minlength="15"
                       maxlength="50" name="slogan" class="form-control" />
                      <label class="form-label" for="form3Example1c">SLOGAN</label>
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
