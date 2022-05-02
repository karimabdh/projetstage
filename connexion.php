<?php


$user="root";
$pass="";
$dbname="dhcsite";
$server="localhost";
$gender=$_GET["gender"];
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$phone=$_GET["phone"];
$mail=$_GET["mail"];
$duree=$_GET["duree"];
$budget=$_GET["budget"];
$message=$_GET["messae"];


try{
    //On se connecte à la BDD
    $dbh = new PDO('mysql:host=localhost;dbname=dhcsite', $user, $pass);
    $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //On insère les données reçues
    $sth = $dbh->prepare("INSERT INTO `formulaire`(`nom`, `prenom`, `tel`, `mail`, `sexe`, `duree`, `budget`, `message`) VALUES (:nom, :prenom, :phone, :mail, :gender, :duree, :budget, :messae)");
    $sth->bindParam(':gender',$gender);
    $sth->bindParam(':nom',$nom);
    $sth->bindParam(':prenom',$prenom);
    $sth->bindParam(':phone',$phone);
    $sth->bindParam(':mail',$mail);
    $sth->bindParam(':duree',$duree);
    $sth->bindParam(':budget',$budget);
    $sth->bindParam(':messae',$message);
    $sth->execute();
    header('Location: merci.html');
}
catch(PDOException $e)
{
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
?>