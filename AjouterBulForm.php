<?php require ('./connexion.php');
session_start();
ob_start();
if(empty($_SESSION['id_user'])|| empty($_SESSION['user-role']))
{header("Location:auth.php");}
if($_SESSION['user-role']!="Professionnel de santé"|| empty($_SESSION['user-role'])||$_SESSION['etatCompte']==0)
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
                <li><a href="chercherAssure.php"><i
                class="data-feather theme-item" data-feather="home"></i> <span
                class="theme-item"> Chercher Assure</span></a></li>
           
    
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
							<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>	
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
               
            <?php
			
            ?>
                <div class="content">
					<div class="head">
					 <h4 class="text-muted">A REMPLIR PAR LES PROFESSIONNELS DE SANTE</h4>
					</div>
					<nav>
						<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
							<a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Consultation & Visites</a>
							<a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pharmacie</a>
						</div>
					</nav> 
						<div class="tab-content" id="nav-tabContent">
                                                           
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form action='AjouterCon.php'  method='POST'>
                                    <div class='row g-3 mb-3'>
										<div class='col-sm-6'>
											<div class='form'>
											    <label for='nom' class='form-label'>Nom</label> 
													<input type='text' class='form-control' name='nom_malade'> 
		
											</div>
										</div>
                                        <div class='col-sm-6'>
											<div class='form'>
												<label for='prnom' class='form-label'>Prenom</label>
												<input type='text' class='form-control' name='prenom_malade'>
											</div>
										</div>
                                        <div class='col-sm-6'>
											<div class='form'>
												<label for='prnom' class='form-label'>Date de naissance</label>
												<input type='date' class='form-control' name='dateN_malade' >
											</div>
										</div>
                                        <div class='col-sm-6'>
											<div class='form'>
											    <label for='' class='form-label'>Le malade</label>
                                                <select class='form-select'  name='leMalade' >
                                                
													<option value='Ascendant'> Ascendant</option>
													<option value='Enfant' >Enfant</option>
													<option value='Conjoint'> Conjoint</option>
													<option value='Assure social ' >Assure social</option>
													</select>
																			 
				
											</div>
										</div>
                                        <div class='col-sm-6'>
											<div class='form'>
												<label for='prnom' class='form-label'>Date de consultation&Visites</label>
													<input type='date' class='form-control' name='DateCon' >
											</div>
										</div>
                                        <div class='col-sm-6'>
											<div class='form'>
												<label for='prnom' class='form-label'>Matricule FISCAL</label>
													<input type='text' class='form-control' name='MatriculeFISCAL_Con'>
											</div>
										</div>
                                        <div class='col-md-6'>
											<label for='role' class='form-label'>Soins effectués ou Prescrits dans le cadre de:</label>
											<select class='form-select'  name='CadreSoin' >
                                               
															<option value='APCI'> APCI</option>
															<option value='MO' >MO</option>
															<option value='Hospitalisation'> Hospitalisation</option>
															<option value='Suivi de Grossesse ' >Suivi de Grossesse </option>
											</select>
														
										</div>
                                        <div class="col-md-6">
											<label for="zip" class="form-label">Code APCI</label> 
                                            <input name="codeAPCI" type="text" class="form-control" id="zip" >
										</div>
																
																	
									</div>
                                        <input type="submit" class='btn btn-sm btn-primary btn-lg'  style='margin-left:80%;padding:10px' value='Ajouter' >
                               
</form>
                                                          
                                                        
							</div>
													
                                                                        
						
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="AjouterPhar.php" method="post">   
                            <div class='row g-3 mb-3'>

									<div class='col-sm-6'>
										<div class='form'>
											<label for='nom' class='form-label'>Date de dispension</label> 
											<input type='date' class='form-control' name='DateDisp'> 
										</div>
									</div>
                                    <div class='col-sm-6'>
										<div class='form'>
											<label for='prnom' class='form-label'>Montant</label>
											<input type='text' class='form-control' name='Montant'>
										</div>
									</div>
                                    <div class='col-sm-6'>
										<div class='form'>
										    <label for='prnom' class='form-label'>Matricule FISCAL</label>
										    <input type='text' class='form-control' name='MatriculeFISCAL_Pharr' >
							            </div>
									</div>
                                </div>
                                <input type="submit" class='btn btn-sm btn-primary btn-lg' style='margin-left:80%;padding:10px' value='Ajouter' >
                            </div>
                            </form>                     
							
					    </div>

				</div>
		</div>
       

	</div>
</div>	
	<div id="loading" class="spinner-border text-primary align-middle"
		role="status">
    </div>

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