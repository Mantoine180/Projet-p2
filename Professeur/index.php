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
        <tr><td>Nom</td><td>Prenom</td><td>Email</td></tr>
        <?php
            //Connexion bdd
            $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
            $id_utilisateur=$_SESSION['ID_UTILISATEUR'];

            $sql="SELECT NOM,PRENOM,EMAIL,utilisateur.ID_UTILISATEUR,calandrier.ID_CALANDRIER
            FROM calandrier
            INNER JOIN eleve ON calandrier.ID_GROUPE = eleve.ID_GROUPE
            INNER JOIN utilisateur ON eleve.ID_UTILISATEUR = utilisateur.ID_UTILISATEUR
            INNER JOIN signature ON utilisateur.ID_UTILISATEUR = signature.ID_UTILISATEUR
            AND calandrier.ID_PROFESSEUR=10
            AND VALID=1
            AND NOW()>HEUR_DEBUT
            AND NOW()<HEUR_FIN";
           
            $result= mysqli_query($link,$sql)or die('Erreur: '.mysqli_error($link));
            $crea_doc = false;
            $first=true;
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
                    }
                    if (isset($_POST['boutonP'.$row['ID_UTILISATEUR']])) 
                    {       
                        mysqli_query($link,'UPDATE `signature` SET `VALID` = 1 WHERE `signature`.`ID_SIGNATURE` = '.$row['ID_UTILISATEUR'].'')or die('Erreur: '.mysqli_error());
                    }
                    if (isset($_POST['boutonVForm'])) 
                    { 
                        $crea_doc = true;
                        $cal = $row['ID_CALANDRIER'];
                    }
                }
            }
            if ($crea_doc) { 
                        mysqli_query($link,'INSERT INTO `document` (`ID_DOCUMENT`, `VALID`,`ID_CALANDRIER`) VALUES (NULL, NULL,'.$cal.')');   
                        $sql2="SELECT *
                        FROM document
                        WHERE ID_CALANDRIER =$cal";
                        $result2= mysqli_query($link,$sql2)or die('Erreur: '.mysqli_error($link));
                        while ($row=mysqli_fetch_assoc($result2))
                        {
                            $doc = $row['ID_DOCUMENT'];
                        }
                        $result= mysqli_query($link,$sql)or die('Erreur: '.mysqli_error($link));
                        while ($row=mysqli_fetch_assoc($result))
                        {
                            mysqli_query($link,'UPDATE `signature` SET `ID_DOCUMENT` = '.$doc.' WHERE `signature`.`ID_SIGNATURE` = '.$row['ID_UTILISATEUR'].'')or die('Erreur: '.mysqli_error());

                        }
                        $sign_prof="INSERT INTO `signature`
                        (`ID_ROLE`,`ID_DOCUMENT`,`VALID`,`ID_UTILISATEUR`,`ID_CALANDRIER`) 
                        VALUES (2,'$doc',1,'$id_utilisateur','$cal')";
                        mysqli_query($link,$sign_prof);
                        mysqli_query($link,'DELETE FROM `signature` WHERE signature.ID_CALANDRIER = '.$cal.' AND signature.ID_DOCUMENT != '.$doc.' AND signature.ID_ROLE = 2');
                        mysqli_query($link,'DELETE FROM `document` WHERE document.ID_CALANDRIER = '.$cal.' AND document.ID_DOCUMENT != '.$doc.'');
                    }

                    
        ?>
        </table>

 </section>

</div>

<script src="app.js"></script>
	<footer>
        <div class="reseau">Confirmation du formulaire
            <form method="post" >
                <input class="favorite styled" type="submit" name="boutonVForm" value="Valider le formulaire">
            </form>
        </div>

    </footer>