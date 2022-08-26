<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion</title>
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
		<div class="container-login100" style="background-color:rgb(30,31,34)  ;">
			<img class="logo" src="images/limayrac.png" >
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form id="contact" action="Types de Comptes/connexion.php" class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-53">
						Connectez vous
					</span>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Nom
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="name" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							 Adresse e-mail
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Mot de Passe
						</span>
					</div>

<<<<<<< HEAD
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Se Connecter
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
=======
        </ul>
    </nav>    
 </header> 
 <section class="banniere">
    <div>Etudiant</div>
        <table border='1'>
        <tr><td>Nom</td><td>Prenom</td><td>Email</td></tr>
        <?php
                
            //Connexion bdd
            $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
            $db = new mysqli("localhost","root","","web p2") or die("Erreur");
            $sql="SELECT utilisateur.ID_UTILISATEUR,NOM,PRENOM,EMAIL,MotDePasse,utilisateur.ID_ROLE 
            FROM utilisateur,role,calandrier,classe,groupe,eleve
            WHERE utilisateur.ID_UTILISATEUR=eleve.ID_UTILISATEUR 
            AND eleve.ID_GROUPE=groupe.ID_GROUPE 
            AND eleve.ID_CLASSE=classe.ID_CLASSE 
            AND groupe.ID_GROUPE=calandrier.ID_GROUPE
            AND classe.ID_CLASSE=calandrier.ID_CLASSE
            GROUP BY ID_Utilisateur";
           
            $result= mysqli_query($db,$sql)or die('Erreur: '.mysqli_error());
            
            while ($row=mysqli_fetch_assoc($result))
            {
                    echo"<form method=\"POST\">
                    <tr>
                    <td>{$row['NOM']}</td>
                    <td>{$row['PRENOM']}</td>
                    <td>{$row['EMAIL']}</td>
                    <td><input class=\"favorite styled\" type=\"submit\" name=\"boutonP{$row['ID_UTILISATEUR']}\" value=\"Présent\">
                    <input class=\"favorite styled\" type=\"submit\" name=\"boutonA{$row['ID_UTILISATEUR']}\" value=\"Absent\"></td>
                    </tr>\n
                    </form>";
                    if ($_POST) { 
                     if (isset($_POST['boutonA'.$row['ID_UTILISATEUR']])) 
                    {       
                        mysqli_query($link,'UPDATE `signature` SET `VALID` = 0 WHERE `signature`.`ID_SIGNATURE` = '.$row['ID_UTILISATEUR'].'')or die('Erreur: '.mysqli_error());
                        echo "{$row['ID_UTILISATEUR']}";
                    }
                    if (isset($_POST['boutonP'.$row['ID_UTILISATEUR']])) 
                    {       
                        mysqli_query($link,'UPDATE `signature` SET `VALID` = 1 WHERE `signature`.`ID_SIGNATURE` = '.$row['ID_UTILISATEUR'].'')or die('Erreur: '.mysqli_error());
                        echo "{$row['ID_UTILISATEUR']}";
                    }
                }
            }
            
                    
        ?>
        </table>
    <a href="GeneratePDF.php"> un pdf </a>
 </section>
</div>
>>>>>>> c725aca38bd3eef373cd9cda5fd39b3c9b67f6d1

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