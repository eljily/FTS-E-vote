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
<p><br><br><br></p>

<h1>BONJOUR ADMIN</h1>


</body>
</html>

