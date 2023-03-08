<?php
include "dbconnection.php";
class Etudiant extends DbConnection{


private $matricule;
private $nom;
private $prenom;
private $email;
private $tel;
private $filiere;
private $pwd ;
private $repwd;

public function __construct($matricule,$nom,$prenom,$email,$tel,$filiere,$pwd,$repwd)
{
    $this->matricule= $matricule;
    $this->nom = $nom;
    $this->prenom =$prenom ;
    $this->email = $email;
    $this ->tel = $tel;
    $this->filiere = $filiere;
    $this->pwd = $pwd;
    $this->repwd = $repwd;
    
}

public function setEtudiant($matricule,$nom,$prenom,$email,$tel,$filiere,$pwd){
    $stmt = $this->connect()->prepare('INSERT INTO etudiant VALUES (?,?,?,?,?,?,?)');
    
    $stmt ->execute(array($matricule,$nom,$prenom,$filiere,$tel,$email,$pwd));

}

public function pwdmatch(){
    if ($this->pwd == $this->repwd){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
public function verifierUniques($matricule,$email,$tel){
    $stmt = $this->connect()->prepare("SELECT * FROM etudiant 
    WHERE Matricule = ? OR Telephone =? OR Email=? ;");
    if(!$stmt->execute(array($matricule,$tel,$email))){
      $stmt = null;
      header("location :signup.php");
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
class LoginUser  extends Etudiant{
    private $email;
    private $pwd;
    public function __construct($email,$pwd){
        $this->email = $email ;
        $this ->pwd = $pwd ;
    }
    public function loginEtudiant($email,$pwd){
        $stmt = $this->connect()->prepare("SELECT * FROM etudiant WHERE Email = ? AND
         Mot_de_passe = ? ;");
         if($stmt->execute(array($email,$pwd))){
            if($stmt->rowCount()>0){
                if($email=="admin@gmail.com" && $pwd==md5("admin")){
                    $_SESSION["email"]=$email;
                    return 2;
                }
            return 1 ;}
            else{
                return 0;
            }
            
         }
         else{
            return 3;
         }
    
    
    }
    public function getByEmail($email){
        $stmt = $this->connect()->query("SELECT * FROM etudiant WHERE Email = '$email' ;");
        $result = $stmt->fetchAll();
        return $result;
    }
}

class CrudEtudiant extends Etudiant{
    public function __construct(){}
    public function getAll(){
        $stmt = $this->connect()->query("SELECT * FROM etudiant ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getParmc($mc){
        $stmt = $this->connect()->query("SELECT * FROM etudiant WHERE Nom OR Prenom OR Email LIKE '%$mc%' ;");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function deleteParID($id){
         $stmt = $this->connect()->prepare("DELETE FROM etudiant WHERE Matricule = ?;");
         if($stmt->execute(array($id))){
            return 1 ;
         }
    }
    public function updateInfo($nom,$prenom,$filiere,$tel,$email,$matricule){
        $stmt = $this->connect()->prepare("UPDATE etudiant SET
        Nom=?,Prenom=?,Filiere=?,Telephone=?,Email=? WHERE Matricule= ?;");
        if($stmt->execute(array($nom,$prenom,$filiere,$tel,$email,$matricule))){
           return 1 ;
        }
    }
}



?>