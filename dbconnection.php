<?php
class DbConnection{
    protected function connect(){
        try{
            $host='mysql:host=localhost;dbname=fstelection';
            $username = "root";
            $password = "36612045Dd";
            $dbc = new PDO($host,$username,$password);
            return $dbc;
        }
        catch(PDOException $e){
            echo "erreur !".$e->getMessage()."<br/>";
            die();
        }
    }
}
?>