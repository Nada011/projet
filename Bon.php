<html>
<head>
    <title></title>
    <link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/main.css" rel="stylesheet">
</head>
<body>
 
<div style='display:flex;flex-direction:row;padding:20px;margin:10px'>
<div><img src="./img/logo.jpg" style='width:200px' alt=""></div>
 <div style="padding:40px;margin-left:10px">  <h1>Reçus de remboursement des frais de soin</h1></div> 
</div>
<div class="canvas-wrapper">
									<table class="table no-margin" id="finTable">
										<thead class="success">
                                            
											<tr>
												<th>Nom malade</th>
												<th>Prenom malade</th>
                                                <th></th>
												<th>Date de naissance</th>
												
												<th>Consul&Visites</th>
                                                <th>Le Cadre</th>
                                                <th>Code APCI</th>
                                                <th>de dispension</th>
                                                <th>Montant</th>
                                              
                                                
											</tr>
										</thead>
										<tbody>
                                            <?php
                                            require ('./connexion.php');
                                            session_start();
                                           $id= $_GET['idBul'];
                                          
                                              $sql = "SELECT * FROM bulletinre WHERE id='$id'";
                                              $result = mysqli_query($conn,$sql);
                                             
                                            
                                           $row=mysqli_fetch_assoc($result);
                                                echo "<td>" . $row["nom_malade"] . "</td>";
                                                echo "<td>" . $row["prenom_malade"] . "</td>";
												echo "<td>" . $row["leMalade"] . "</td>";
                                                echo "<td>" . $row["dateN_malade"] . "</td>";
												echo "<td>" . $row["DateCon"] . "</td>";
                                                echo "<td>" . $row["CadreSoin"] . "</td>";
                                                echo "<td>" . $row["codeAPCI"] . "</td>";
                                                echo "<td>" . $row["DateDisp"] . "</td>";
                                                echo "<td>" . $row["Montant"] . "</td>";
                                               
                                          
											echo"</tr>";?>
										</tbody>
									</table>

								</div>
                                <div style='margin-top:50px;margin-left:70%'><h5>SIGNATURE ET CACHET</h5></div>
<button style='margin-top:15%;margin-left:40px' onclick="imprimerPage()">Imprimer</button>
    <!-- Script JavaScript pour l'impression -->
    <script>
        function imprimerPage() {
            window.print();
        }
    </script>
</body>
</html>