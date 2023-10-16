<?php
require ('./connexion.php');
session_start();
$id = $_GET['idBul'];

$rq3 = "UPDATE bulletinre SET etat=1 WHERE `bulletinre`.`id`='$id'";
if ($conn->query($rq3) === TRUE) {
    
 header("Location:Bon.php?idBul=$id");   
}




?>