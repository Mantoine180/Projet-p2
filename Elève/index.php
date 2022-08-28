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
            $sql="SELECT NOM,PRENOM,EMAIL,utilisateur.ID_UTILISATEUR,calandrier.ID_CALANDRIER,ID_DOCUMENT FROM utilisateur
            INNER JOIN eleve ON utilisateur.ID_UTILISATEUR =eleve.ID_UTILISATEUR
            INNER JOIN calandrier ON eleve.ID_GROUPE= calandrier.ID_GROUPE
            INNER JOIN document ON calandrier.ID_CALANDRIER=document.ID_CALANDRIER
            AND utilisateur.ID_UTILISATEUR=$id_eleve
            AND NOW()>HEUR_DEBUT
            AND NOW()<HEUR_FIN";

            $result= mysqli_query($link,$sql)or die('Erreur: '.mysqli_error($link));
            $row=mysqli_fetch_assoc($result);
            $cal=$row['ID_CALANDRIER'];
            $doc=$row['ID_DOCUMENT'];
                    echo"<form method=\"POST\">
                    <tr>
                    <td>".$row['NOM']."</td>
                    <td>".$row['PRENOM']."</td>
                    <td>".$row['EMAIL']."</td>
                    <td><input class=\"favorite styled\" type=\"submit\" name=\"boutonP{$row['ID_UTILISATEUR']}\" value=\"Présent\">
                    </tr>\n
                    </form>";

                    if (isset($_POST['boutonP'.$row['ID_UTILISATEUR']])) 
                    {   
                        $verification="SELECT ID_ROLE,ID_DOCUMENT,VALID,ID_UTILISATEUR,ID_CALANDRIER
                        FROM signature
                        WHERE ID_ROLE=1
                        AND ID_DOCUMENT=$doc
                        AND VALID=1
                        AND ID_UTILISATEUR=$id_eleve
                        AND ID_CALANDRIER=$cal";
                        
                        if (mysqli_num_rows(mysqli_query($link,$verification))==0)
                        {
                            $sign_eleve="INSERT INTO `signature`
                            (ID_ROLE,ID_DOCUMENT,VALID,ID_UTILISATEUR,ID_CALANDRIER) 
                            VALUES (1,'$doc',1,'$id_eleve','$cal')";
                            mysqli_query($link,$sign_eleve);
                        }


                    }
            
                    
        ?>
        </table>
 </section>

</div>
</footer>