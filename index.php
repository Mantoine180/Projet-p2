<!DOCTYPE html>
<html lang="en">
<head>
	<title>Identification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-color:rgb(30,31,34) ;">
		<img class="logo" src="images/limayrac.png" >
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form id="contact" action="inscription.php" class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-53">
						Identifiez-vous
					</span>					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Nom
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="name" id="name" required >
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Prénom
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="firstname" id="firstname" required >
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							 Adresse e-mail
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="L'adresse email n'est pas au format chaine@chaine.chaine " required>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Âge
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="number" name="age" id="age" min="1" max="120" pattern="[0-9]" required title="L'âge doit être supèrieur à 1 et doit être infèrieur à 120" required>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Code postal
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="number" name="codepostal" id="codepostal"  pattern="[0-9]">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							 Ville
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="town" id="town">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Numéro de téléphone
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="tel" id="phone" name="phone" pattern="[0-9]{10}" required title="Le numéro de téléphone doit faire 10 chiffres"  required >
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Ok
						</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>