<?php require ('./connexion.php');
session_start();
ob_start();?>
<!Doctype html>
<html lang="fr">
<head>
<title>CNAM</title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link
	href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
	rel="stylesheet">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
	crossorigin="anonymous">
</head>

<style>
@import
	url('https://fonts.googleapis.com/css?family=Montserrat|Quicksand');

* {
	font-family: 'quicksand', Arial, Helvetica, sans-serif;
	box-sizing: border-box;
}

body {
	background: #fff;
	background-image: url('./img/bg.svg');
	background-repeat: no-repeat;
	background-size: cover;
}

#page {
	display: none;
}

#loading {
	display: block;
	position: fixed;
	top: 40%;
	left: 45%;
	width: 150px;
	height: 150px;
	background-repeat: no-repeat;
	background-position: center;
}

.form-modal {
	position: relative;
	width: 450px;
	height: auto;
	margin-top: 4em;
	left: 50%;
	transform: translateX(-50%);
	background: #fff;
	border-top-right-radius: 20px;
	border-top-left-radius: 20px;
	border-bottom-right-radius: 20px;
	box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1)
}

#button {
	cursor: pointer;
	position: relative;
	text-transform: capitalize;
	font-size: 1em;
	z-index: 2;
	outline: none;
	border: none;
	background-color: blue;
	transition: 0.2s;
}

.form-modal .btn {
	border-radius: 20px;
	border: none;
	font-weight: bold;
	font-size: 1.2em;
	padding: 0.8em 1em 0.8em 1em !important;
	transition: 0.5s;
	border: 1px solid #ebebeb;
	margin-bottom: 0.5em;
	margin-top: 0.5em;
}

.form-modal .login {
	background: #0d6efd;
	color: #fff;
}

.form-modal .login:hover {
	background: #003399;
}





.form-toggle button:nth-child(1) {
	border-bottom-right-radius: 20px;
}

.form-toggle button:nth-child(2) {
	border-bottom-left-radius: 20px;
}

#login-toggle {
	background: #0d6efd;
	color: #ffff;
}


.form-modal form {
	position: relative;
	width: 90%;
	height: auto;
	left: 50%;
	transform: translateX(-50%);
}

#login-form {
	position: relative;
	width: 100%;
	height: auto;
	padding: 40px;
    
   
}





.input  {
	position: relative;
	width: 100%;
	font-size: 1em;
	padding: 0.6em 0.8em 0.6em 0.8em;
	margin-top: 0.3em;
	margin-bottom: 0.3em;
	border-radius: 20px;
	border: none;
	background: #ebebeb;
	outline: none;
	font-weight: bold;
	transition: 0.7s;
}

.input:focus, .input:active {
	transform: scaleX(1.02);
}

.input::-webkit-input-placeholder {
	color: #222;
}

.form-modal p {
	font-size: 16px;
	font-weight: bold;
}

.form-modal p a {
	color: #57b846;
	text-decoration: none;
	transition: 0.2s;
}
#logo{
    width:200px;
    margin-bottom:15px;
    margin-left:27%
}
#button:hover{
	opacity: 0.8;
}
#button {
	width: 100%;
	margin-top: 0.5em;
	padding: 0.6em;
	color:white;
	background:blue;
    
}
.form-modal p a:hover {
	color: #222;
}

.form-modal i {
	position: absolute;
	left: 10%;
	top: 50%;
	transform: translateX(-10%) translateY(-50%);
}

.-box-sd-effect:hover {
	box-shadow: 0 4px 8px hsla(210, 2%, 84%, .2);
}

@media only screen and (max-width:500px) {
	.form-modal {
		width: 100%;
	}
}

@media only screen and (max-width:400px) {
	i {
		display: none !important;
	}
}
</style>
</head>
<body>

	<div id="page">

		<div class="form-modal">

			

			
				<form name="auth" method="post"> 
                   
                    <img src="./img/logo.jpg" alt="" id="logo">
					<input name="matricule" class="input"type="text" placeholder="Matricule" required/> 
					<input name="mdp" class="input" type="password" placeholder="Mot de passe" required />
					
					<input type="submit" name="submit" value="Connexion"
					id="button" class="btn login ">
					
					
				
				</form>
			</div>

			

		</div>

	</div>
	<div id="loading" class="spinner-border text-primary align-middle"
		role="status"></div>

	
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
		crossorigin="anonymous"></script>
	<script type="text/javascript">
		function onReady(callback) {
			var intervalId = window.setInterval(function() {
				if (document.getElementsByTagName('body')[0] !== undefined) {
					window.clearInterval(intervalId);
					callback.call(this);
				}
			}, 900);
		}

		function setVisible(selector, visible) {
			document.querySelector(selector).style.display = visible ? 'block'
					: 'none';
		}

		onReady(function() {
			setVisible('#page', true);
			setVisible('#loading', false);
		});
	</script>
<?php if(isset($_POST['mdp']) && isset($_POST['matricule'])){
					
						$mdp = $_POST['mdp'];
						$matricule =  $_POST['matricule'];
						$sql = "SELECT * FROM utilisateurs WHERE matricule='$matricule' AND mdp='$mdp' ";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)===1){
							$row=mysqli_fetch_assoc($result);
							if($row['matricule']===$matricule&&$row['mdp']===$mdp) {
						$_SESSION['id_user']=$row['matricule'];	
						$_SESSION['user-role']=$row['role'];
						$_SESSION['etatCompte']=$row['etatCompte'];
						if($row['role']=="Professionnel de santé"|| $row['role']=="Employé CNAM" ){
							header("Location:chercherAssure.php");
						}
						if($row['role']=="Admin"){
						header("Location:home.php");}
						exit();
							}
							else{
								
								header("Location:auth.php");
								
									
								
								exit();
							}
							
						}
						$r=mysqli_num_rows($result);
						if ($r==0){
							echo '<script>alert("informations incorrecte")</script>';
							
						}
						}
						ob_end_flush();?>	
</body>
</html>