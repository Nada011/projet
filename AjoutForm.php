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
<style>
 
</style>
<body class="d-flex flex-column h-100">
	<div id="page">

		<div class="wrapper">

        <nav id="sidebar" class="active">

<div class="sidebar-header text-center">
    <img src="./img/logo.jpg" style="width:100%;height:80%" alt="logo" class="logo">
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
							</div>
						
						</div>
						<div class="card">
							<div class="content" id="tableContent">
								<div class="head">
								<?php 
								$sql = "SELECT * FROM utilisateurs WHERE matricule=''";
								$result = mysqli_query($conn,$sql);
								if(mysqli_num_rows($result)===1){}
									$row=mysqli_fetch_assoc($result);
								
								?>
								<div class="canvas-wrapper">
                                <form name='Modifier' method='POST'>
																	<div class='row g-3 mb-3'>
																	<div class='col-sm-6'>
																		<div class='form'>
																		<label for='nom' class='form-label'>Nom 
														</label>
																			<input type='text' class='form-control' name='nom'  required=''> 
		
																		</div>
																	</div>
																	<div class='col-sm-6'>
																		<div class='form'>
																		<label for='prnom' class='form-label'>Matricule 
														</label>
																			<input type='text' class='form-control' name='matricule' required='' >
																			 
				
																		</div>
																	</div>

																</div>
																<div class='col-12'>
														<label for='email' class='form-label'>Adresse 
														</label> <input name='adresse' type='text' class='form-control' id='' required='' >
												
													</div>
													<div class='col-12'>
													<label for='email' class='form-label'>Mot de passe 
													</label> <input name='mdp' type='password' class='form-control' required='' >
											
												</div>
												<div class='col-12'>
														<label for='email' class='form-label'>numéro telephone 
														</label> <input name='numTel' type='text' class='form-control' id='' required='' >
												
													</div>
													<div class='col-md-5'>
														<label for='role' class='form-label'>Role</label>
														 <select class='form-select'  name='role' required=''>
															<option value='Professionnel de santé' >Professionnel de santé</option>
															<option value='Employé CNAM' >Employé CNAM</option>
														</select>
														
													</div>
											<?php		
												if ($_SERVER["REQUEST_METHOD"] == "POST") {
													
													$mdp = $_POST['mdp'];
													$matricule =  $_POST['matricule'];
													$nom =  $_POST['nom'];
													$adresse =  $_POST['adresse'];
													$numTel =  $_POST['numTel'];
													$etatCompte =  $_POST['etatCompte'];
													
		
													$sql1 = "UPDATE utilisateurs SET nom='$nom',adresse='$adresse',numTel='$numTel',mdp='$mdp',etatCompte='$etatCompte'
													WHERE matricule='$matricule' ";
													
														if(mysqli_query($conn,$sql1)){
															header("Location:home.php");exit();
														}
														
											
											//
											
											
												}?>
												
											<input type='submit' class='btn btn-sm btn-primary btn-lg' style='margin-left:80%;padding:10px' name='submit' value='Ajouter'
											id='button' class='btn login '></form>
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