<?php require ('./connexion.php');
session_start();
ob_start();
if(empty($_SESSION['id_user'])|| empty($_SESSION['user-role']))
{header("Location:auth.php");}
if($_SESSION['user-role']!="Admin"|| empty($_SESSION['user-role'])||$_SESSION['etatCompte']==0)
{header("Location:forbidden.php");}
?>
<!doctype html>

<html lang="en" class="h-100">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" type="image/x-icon" href="./img/leaf.svg">
<title>CNAM</title>
<link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
	<div id="page">

		<div class="wrapper">

        <nav id="sidebar" class="active">

<div class="sidebar-header text-center">
    <img src="./img/logo.jpg" style="width:100%;height:80%" alt="logo" >
</div>

<ul style='margin-top:20px' class="list-unstyled components text-secondary">
    <li><a href="home.php"><i
            class="data-feather theme-item" data-feather="home"></i> <span
            class="theme-item"> Dashboard</span></a></li>
    <li><a href="AjoutForm.php"><i class="data-feather theme-item"
            data-feather="file-text"></i> <span class="theme-item">Ajouter utilisateur</span></a></li>
    
</ul>
</nav>

			<div id="bodywrapper" class="container-fluid showhidetoggle">

				<nav class="navbar navbar-expand-md navbar-white bg-white py-0"
					aria-label="navbarexample" id="navbar">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse"
							class="btn btn-light py-0">
							<i data-feather="menu"></i> <span></span>
						</button>
						<img src="./img/logo.jpg" alt="logo" style="width:100px;height:50px"
							class="app-logo theme-item mx-2 navbrandarea1">
						
						<button class="navbar-toggler py-0" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
							aria-controls="navbarsExample04" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"><i data-feather="menu"></i></span>
						</button>

						<div class="collapse navbar-collapse mx-1" id="navbarsExample04">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">

								
							</ul>
							<div class="usermenu">
								<div class="nav-dropdown py-0">
									<a href="#"
										class="nav-item nav-link dropdown-toggle text-secondary py-0"
										id="navbarDropdown3" role="button" data-bs-toggle="dropdown"
										aria-expanded="false"> <img class="theme-item user-avatar"
										src="./img/user.svg" alt="User image"> <!--<i class="theme-item" -->
										<!--data-feather="user"></i> --> <span class="theme-item"></span><i class="theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu dropdown-menu-end"
										aria-labelledby="navbarDropdown3">
										
										<li><a href="./logout.php" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="log-out"></i> Logout</a></li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</nav>


				<div class="settings">
					<div class="modal fade" id="settingsModal"
						aria-labelledby="settingsModalTitle" aria-hidden="true"
						tabindex="-1">
						<!-- 				 data-bs-backdrop="static" data-bs-keyboard="false" -->
						<div class="modal-dialog modal-dialog-settings">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title" id="exampleModalLabel">Settings</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">

									<section id="logincontent" class="shiftdown">

										<div class="row g-3 mb-3 mt-3">

											
											<div class="col-md-6">
												<h6 class="text-muted"></h6>
												
												
											</div>
										</div>
										<div class="row g-3 mb-3 mt-3">
											<div class="col-md-6">
											
												
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">View Size</h6>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioCompactView"> <label
														class="form-check-label" for="radioCompactView">
														Compact</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioFullView"> <label
														class="form-check-label" for="radioFullView">
														Full-screen </label>
												</div>
												<div class="d-flex justify-content-between">
													<button onclick="removeViewSizeCookie()">Reset to
														Default</button>
												</div>

											</div>
										</div>
										<hr />

									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

			<div class="content">
					<div class="container-fluid">
						<div class="row mt-2">
							<div class="col-md-6 float-start">
								<h4 class="m-0 text-dark text-muted">Dashboard Admin</h4>
							</div>
						
						</div>
						<div class="card">
							<div class="content" id="tableContent">
								<div class="head">
								
								<div class="canvas-wrapper">
									<table class="table no-margin" id="finTable">
										<thead class="success">
                                            
											<tr>
												<th>Nom</th>
												<th>Adresse</th>
												<th>numTel</th>
												<th>Matricule</th>
												<th>Role</th>
                                                <th>Etat</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
                                            $sql = "SELECT * FROM utilisateurs";
                                            $result = mysqli_query($conn,$sql);
                                            
                                            while ( $row=mysqli_fetch_assoc($result)){
                                                echo "<td>" . $row["nom"] . "</td>";
                                                echo "<td>" . $row["adresse"] . "</td>";
												echo "<td>" . $row["matricule"] . "</td>";
                                                echo "<td>" . $row["numTel"] . "</td>";
												echo "<td>" . $row["role"] . "</td>";
                                                echo "<td>" ;
                                                    if ($row["etatCompte"]==1){
                                                      
                                               echo" <span class='badge bg-success' >Activé
														</span>"; }
                                                        if ($row["etatCompte"]==0){
                                                            echo" <span class='badge bg-danger' >Désactivé
                                                                     </span>"; }
                                                
                                                echo "</td>";
									echo"<td>
                                    <a href='editUser.php?matriculeUser=".$row['matricule']."' class='btn btn-sm btn-secondary'>
														Modifier</a>
                                                            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' style='display: none;' aria-hidden='true'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
									<a href='editUser.php?matriculeUser=".$row['matricule']." class='btn-close' data-bs-dismiss='modal' aria-label='Close'></a>
																	</div>
																	<div class='modal-body'>
                                      								<form name='Modifier' method='post'>
																	<div class='row g-3 mb-3'>
																	<div class='col-sm-6'>
																		<div class='form'>
																		<label for='nom' class='form-label'>Nom 
														</label>
																			<input type='text' class='form-control' name='nom'  value='".$row['nom']."' required=''> 
		
																		</div>
																	</div>
																	<div class='col-sm-6'>
																		<div class='form'>
																		<label for='prnom' class='form-label'>Adresse
														</label>
																			<input type='text' class='form-control' name='adresse' value='".$row['adresse']."'>
																			 
				
																		</div>
																	</div>

																</div>
																<div class='col-12'>
														<label for='email' class='form-label'>Matricule 
														</label> <input name='matricule' type='text' class='form-control' id='email' value='".$row['matricule']."' readonly>
												
													</div>
													<div class='col-12'>
													<label for='email' class='form-label'>numéro telephone 
													</label> <input name='numTel' type='text' class='form-control' id='email' value='".$row['numTel']."'>
											
												</div>
													<div class='col-12'>
													<label for='email' class='form-label'>Mot de passe 
													</label> <input name='mdp' type='password' class='form-control'  value='".$row['mdp']."'required='' >
											
												</div>
												<h4 class='mb-3'>Etat du compte</h4>
													<div class='my-3'>
													<div class='form-check'>
														<input id='credit' name='etatCompte'value='1' type='radio' class='form-check-input'";
														if($row['etatCompte']==1){
													echo "	checked=''";}
													echo" required=''> 
														<label class='form-check-label'for='active'>Activé</label>
													</div>
													<div class='form-check'>
														<input id='debit' name='etatCompte' value='0' type='radio' class='form-check-input' required='' ";
														if($row['etatCompte']==0){
															echo "	checked=''";}
															 echo">
														 <label class='form-check-label' for='deactive'>Désactiver</label>
													</div>
													
												</div>
												
													
												
											
											//
											
											
												}
										
                                    </td>";
											echo"</tr>";}?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					
					</div>

				</div>

			</div>

		</div>
	</div>
	
	<div id="loading" class="spinner-border text-primary align-middle"
		role="status"></div>

	<button class="btn btn-sm btn-primary rounded-circle"
		onclick="scrollToTopFunction()" id="scrollToTop" title="Scroll to top">
		<i data-feather="arrow-up-circle"></i>
	</button>
	<script src="./js/feather.min.js"></script>
	<script src="./js/bootstrap.bundle.min.js"></script>
	<script src="./js/Chart.min.js"></script>
	<script src="./js/script.js"></script>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
			feather.replace();
		});
	</script>




</body>
</html>