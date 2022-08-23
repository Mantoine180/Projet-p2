<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.js"></script>
    <script src="https://kit.fontawesome.com/59b9fc1090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Projet P2</title>
</head>
<body>
 <header>
    <nav>
        <ul>
         <li><a href="../index.html"> <a class="logo">Projet P2 </a></li>   
        <li>
            <div class="produits">
                <a href="/identification/index.html">Identifiez vous<i class="fas fa-user-plus"></i></a>
            </div>
        </li>


        <li> 
            <div class="services">
                <a href="/identification/index.html">Connectez vous<i class="fas fa-sign-in-alt"></i></a>
            </div>
           </div>
       </li>  

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
            AND classe.ID_CLASSE=calandrier.ID_CLASSE";
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
 </section>

</div>

<script src="app.js"></script>
	<footer>
        <div class="reseau">Confirmation du formulaire
        <button class="favorite styled" type="button">
            Valider le formulaire
        </button>
    </div>
    </footer>