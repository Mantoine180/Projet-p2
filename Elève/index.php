<?php session_start(); ?>
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
        <tr><td>Nom</td><td>Prénom</td><td>Email</td><td>Validation</td></tr>
        <?php
                
            //Connexion bdd
            $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
            $db = new mysqli("localhost","root","","web p2") or die("Erreur");
            $id_eleve=$_SESSION['ID_UTILISATEUR'];
            $sql="SELECT NOM,PRENOM,EMAIL,utilisateur.ID_UTILISATEUR FROM utilisateur
            INNER JOIN eleve ON utilisateur.ID_UTILISATEUR =eleve.ID_UTILISATEUR
            INNER JOIN calandrier ON eleve.ID_GROUPE= calandrier.ID_GROUPE
            AND utilisateur.ID_UTILISATEUR=$id_eleve
            AND NOW()>HEUR_DEBUT
            AND NOW()<HEUR_FIN";

            $result= mysqli_query($link,$sql)or die('Erreur: '.mysqli_error($link));
            $row=mysqli_fetch_assoc($result);

                    echo"<tr>
                    <td>".$row['NOM']."</td>
                    <td>".$row['PRENOM']."</td>
                    <td>".$row['EMAIL']."</td>
                    <td><button class=\"favorite styled\" type=\"button\">Présent</button></td>
                    </tr>\n";

                    if (isset($_POST['boutonP'.$row['ID_UTILISATEUR']])) 
                    {       
                        mysqli_query($link,'UPDATE `signature` SET `VALID` = 1 WHERE `signature`.`ID_SIGNATURE` = '.$row['ID_UTILISATEUR'].'')or die('Erreur: '.mysqli_error());
                        echo "{$row['ID_UTILISATEUR']}";
                    }
            
                    
        ?>
        </table>
 </section>

</div>
</footer>