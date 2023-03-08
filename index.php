
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
    <?php include "header.php";
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

    BONJOUR <h1><?php echo $_SESSION['nom']; ?></h1>
    
</body>
</html>