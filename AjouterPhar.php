<?php
require ('./connexion.php');
session_start();

$idUser=$_SESSION['idAssure'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $DateDisp=$_POST['DateDisp'];
    $Montant=$_POST['Montant'];
    $MatriculeFISCAL_Pharr=$_POST['MatriculeFISCAL_Pharr'];
    $sqlU1="INSERT INTO bulletinre (id_assure,etat,DateDisp,Montant,MatriculeFISCAL_Pharr)VALUES
    ('$idUser',0,'$DateDisp','$Montant','$MatriculeFISCAL_Pharr')
    ";
   if(mysqli_query($conn,$sqlU1)){
    header('Location:listBul.php'); 
    exit();}}


?>