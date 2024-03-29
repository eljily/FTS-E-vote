<?php 
include "Etudiant.php";
if(isset($_POST["submit"])){
    //collection des data
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $email = $_POST['email']; 
    $tel = $_POST['tel']; 
    $filier = $_POST['filiere']; 
    $pwd = $_POST['pwd'];
    $repwd = $_POST['repwd'];

   //traitement :
    $e = new Etudiant($matricule,$nom,$prenom,$email,$tel,$filier,$pwd,$repwd);
  
  
    if(!($e->pwdmatch())){
        header("location:ajout_etudiant.php?error=PASSWORD DIDNT MATCH!!");
    }
    else if((!$e->verifierUniques($matricule,$tel,$email))){
      header("location:ajout_etudiant.php?error=ETUDIANT DEJA INSCRIT :)");
    }
    else{
        $pwdh = md5($pwd);
    $e->setEtudiant($matricule,$nom,$prenom,$email,$tel,$filier,$pwdh);
    header("location:admin_dashbord.php");
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
  <?PHP include "header_admin.php";
       ?>
<P></P>
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
                      <input required type="text" id="form3Example1c" name="matricule" minlength="5" maxlength="5" class="form-control" />
                      <label class="form-label" for="form3Example1c">matricule</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" name="nom" class="form-control" />
                      <label class="form-label" for="form3Example1c">nom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" name="prenom" class="form-control" />
                      <label class="form-label" for="form3Example1c">prenom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="email" id="form3Example3c" name="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" minlength="8" maxlength="8" name="tel" class="form-control" />
                      <label class="form-label" for="form3Example1c">numero de telephon</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="text" id="form3Example1c" name="filiere" class="form-control" />
                      <label class="form-label" for="form3Example1c">filier</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password" id="form3Example4c" name="pwd" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password" id="form3Example4cd" name="repwd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">R-type passsword</label>
                    </div>
                  </div>

               
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Enregistrer</button>
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