<?php

class db
{
public $pdo;
function __construct(){
}

 public function createAccount(string $email, string $password){
    try {
        $pdo = new PDO('sqlite: ' . __DIR__ . ' ../database/base.db');
    }
 catch (PDOException $e) {
         echo 'Connexion échouée : ' . $e->getMessage();
     }
    $sth = $pdo->prepare("SELECT * FROM Users WHERE username= :email");
    $sth->execute([
        "email" => $email
    ]);
    if($sth->fetch()){
        $sth = $this->pdo->prepare("INSERT INTO Users (email, passord)");
        $sth->execute([
            "email"=>$email,
            "password"=>$password
        ]);
        return 0;
    }
    return 1;
 }
}