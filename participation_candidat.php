<?php 
include "dbconnection.php";
class Participe_candidat extends DbConnection{
    public function __construct(){}
    
    public function setParticipation($id_candidat,$id_election){
        $stmt = $this->connect()->prepare("INSERT INTO participation_candidat VALUES (?,?)");
        $stmt ->execute(array($id_candidat,$id_election));
    }

    public function isParticiped($id_election,$id_candidat){
        $stmt = $this->connect()->prepare("SELECT * FROM participation_candidat 
        WHERE ID_Candidat=? AND ID_Election=?");
        if(!$stmt->execute(array($id_election,$id_candidat))){
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
}