
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>INDEX</title>
</head>
<body>
    <?php 
   
    include "header.php";
   
    if($_SESSION["email"]=="admin@gmail.com"){
        header("location:admin_dashbord.php");
        exit();
    }

    if(!isset($_SESSION["email"])){
        header("location:login.php");
        exit();
    }
    if(isset($_GET["logout"])=="lout"){
        session_destroy();
        header("location:login.php");
    }
    if(isset($_POST["submit"])){
        $id_election=$_POST["id_election"];
    }
    ;?>
<p></br></p>
<p></br></p>

<form class="form-inline" method="post" action="">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">ELECTION</label>
    <input type="type" class="form-control" name="id_election" id="inputPassword2" placeholder="id election">
  </div>
  <button type="submit" name="submit" class="btn btn-primary mb-2">ENTRER</button>
</form>
<?= @$id_election ?>
</body>
</html>