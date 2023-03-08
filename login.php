<?php
include "Etudiant.php";
if(isset($_POST["submit"])){
  session_start();
    $error;
    $email = $_POST['email'];
    $pwdh = md5($_POST['pwd']);
    $e = new LoginUser($email,$pwdh);
    if($e->loginEtudiant($email,$pwdh)==1){
      $res = $e->getByEmail($email);
      foreach($res as $r){
        $_SESSION['matricule']=$r['Matricule'];
        $_SESSION['nom']= $r['Nom'];
        $_SESSION['prenom']=$r['Prenom'];
        $_SESSION['filiere'] =$r['Filiere'];
        $_SESSION['tel'] =$r['Telephone'];
        $_SESSION['email'] =$r['Email'];
      }
      header("location:index.php");
    }
    else if($e->loginEtudiant($email,$pwdh)==2 && $_SESSION["email"]=='admin@gmail.com'){
      $res = $e->getByEmail($email);
      foreach($res as $r){
        $_SESSION['matricule']=$r['Matricule'];
        $_SESSION['nom']= $r['Nom'];
        $_SESSION['prenom']=$r['Prenom'];
        $_SESSION['filiere'] =$r['Filiere'];
        $_SESSION['tel'] =$r['Telephone'];
        $_SESSION['email'] =$r['Email'];
      }
      header("location:admin_dashbord.php");
    }
    else if($e->loginEtudiant($email,$pwdh)==0){
      header("location:login.php?error=MOT DE PASS OU EMAIL INCORRECT!!&email=$email");
    }
    else{header("location:login.php?error=DATABASEERROR");}
}
if(isset($_GET["email"])){
  $email = $_GET["email"];
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

    
<section class=" text-center text-lg-start">
  <div class="container" >
    <div class="row g-0 d-flex align-items-center">
      
      <div class="col-lg-12">
        <div class="card-body py-5 px-md-5" >

          <form class="mx-1 mx-md-4" method="POST" action="">
            <!-- Email input -->
            <?php if(isset($_GET['error'])){$error = $_GET['error'] ;?>
            <div class="alert alert-danger" role="alert">
              <?php
              echo $error ;}?>
            </div>


            <div class="form-outline mb-4">
              <input type="email" id="form2Example1" name="email"
              value="<?=@$email ?>" placeholder="exp@gmail.com" class="form-control" />
              <label class="form-label" for="form2Example1">Votre Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="pwd" placeholder="********" id="form2Example2" class="form-control" />
              <label class="form-label" for="form2Example2">Mot de pass</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
           
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">LOGIN</button>
            </div>
            <b><a href="signup_etudiant.php" >
        CREER UN COMPTE</a></b>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Design Block -->
</body>
</html>