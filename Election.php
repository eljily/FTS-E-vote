<?php
include "dbconnection.php";


class Election extends DbConnection{


    private $id_election;
    private $nom;
    private $date_debut;
    private $date_fin;
    
    public function __construct($id_election,$nom,$date_debut,$date_fin)
    {
        $this->id_election= $id_election;
        $this->nom = $nom;
        $this->date_debut =$date_debut ;
        $this->date_fin = $date_fin;
        
        
    }
    public function setElection($id_election,$nom,$date_debut,$date_fin){
        $stmt = $this->connect()->prepare('INSERT INTO election VALUES (?,?,?,?)');
        
        $stmt ->execute(array($id_election,$nom,$date_debut,$date_fin));
    
    }
    public function verifierUniques($id_election){
        $stmt = $this->connect()->prepare("SELECT * FROM election 
        WHERE ID_Election=?");
        if(!$stmt->execute(array($id_election))){
          $stmt = null;
          header("location :admin_dashbord.php");
        }
        if($stmt->rowCount()>0){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result; 
    }
    public function verifierDate($date_debut,$date_fin){
        
    }
    
}
class CrudElection extends Election{
    public function __construct(){}
    public function getAll(){
        $stmt = $this->connect()->query("SELECT * FROM election ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getParmc($mc){
        $stmt = $this->connect()->query("SELECT * FROM election WHERE Nom LIKE '%$mc%' ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function deleteParID($id_election){
         $stmt = $this->connect()->prepare("DELETE FROM election WHERE ID_Election = ?;");
         if($stmt->execute(array($id_election))){
            return 1 ;
         }
    }
    public function updateInfo($id_election,$nom,$date_debut,$date_fin){
        $stmt = $this->connect()->prepare("UPDATE election SET
        Nom=?,Date_Debut=?,Date_Fin=? WHERE ID_Election= ?;");
        if($stmt->execute(array($nom,$date_debut,$date_fin,$id_election))){
           return 1 ;
        }
    }
}
?>
