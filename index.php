
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
    ;?>
<p></br></p>
<p></br></p>

    
</body>
</html>