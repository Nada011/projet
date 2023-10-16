<?php
require ('./connexion.php');
session_start();

$idUser=$_SESSION['idAssure'];

    if($_SERVER["REQUEST_METHOD"]=="POST"){
                                    
        $leMalade = $_POST['leMalade'];
        $nom =  $_POST['nom_malade'];
        $prenom_malade =  $_POST['prenom_malade'];
        $dateN_malade =  $_POST['dateN_malade'];
        $DateCon =  $_POST['DateCon'];
        $MatriculeFISCAL_Con =  $_POST['MatriculeFISCAL_Con'];
        $CadreSoin =  $_POST['CadreSoin'];
        $codeAPCI = $_POST['codeAPCI'];
        $sqlU="INSERT INTO bulletinre (id_assure,etat,nom_malade,prenom_malade,dateN_malade,leMalade,DateCon,MatriculeFISCAL_Con,CadreSoin,codeAPCI)VALUES
        ('$idUser',0
        ,'$nom','$prenom_malade','$dateN_malade','$leMalade','$DateCon','$MatriculeFISCAL_Con','$CadreSoin','$codeAPCI')";
       
       if ($conn->query($sqlU) === TRUE) {

        header('Location:listBul.php');
        exit(); 
       }
    }

?>