<?php 
include "dbconnection.php";
class Candidat extends DbConnection{
    private $id_candidat;
    private $nom;
    private $prenom;
    private $photo;
    private $slogan;
    public function __construct($id,$nom,$prenom,$photo,$slogan){
        $this->id_candidat = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->photo =$photo;
        $this->slogan = $slogan;
    }
    public function setCandidat($id,$nom,$prenom,$photo,$slogan){
        $stmt = $this->connect()->prepare('INSERT INTO candidat VALUES (?,?,?,?,?)');
        
        $stmt ->execute(array($id,$nom,$prenom,$photo,$slogan));
    
    }
    public function verifierUniques($id){
        $stmt = $this->connect()->prepare("SELECT * FROM candidat
        WHERE ID_Candidat = ?;");
        if(!$stmt->execute(array($id))){
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

class CrudCandidat extends Candidat{
    public function __construct(){}
    public function getAll(){
        $stmt = $this->connect()->query("SELECT * FROM candidat ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getParmc($mc){
        $stmt = $this->connect()->query("SELECT * FROM candidat WHERE Nom OR Prenom LIKE '%$mc%' ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function deleteParID($id){
         $stmt = $this->connect()->prepare("DELETE FROM candidat WHERE ID_Candidat = ?;");
         if($stmt->execute(array($id))){
            return 1 ;
         }


    }
    public function updateInfo($id,$nom,$prenom,$photo,$slogan){
        $stmt = $this->connect()->prepare("UPDATE candidat SET
        Nom=?,Prenom=?,Photo=?,Slogan=? WHERE ID_Candidat= ?;");
        if($stmt->execute(array($nom,$prenom,$photo,$slogan,$id))){
           return 1 ;
        }
    } 
}