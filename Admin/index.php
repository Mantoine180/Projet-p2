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
                <a href="../identification/index.php">Identifiez vous<i class="fas fa-user-plus"></i></a>
            </div>
        </li>


        <li> 
            <div class="services">
                <a href="../index.php">Connectez vous<i class="fas fa-sign-in-alt"></i></a>
            </div>
           </div>
       </li>  

        </ul>
    </nav>    
 </header> 
 <section class="banniere">
    <div>Etudiant</div>
        <table border='1'>
        <tr><td>Heure de début</td><td>Heure de fin</td><td>ID Professeur</td><td>Document PDF</td></tr>
        <?php
                
            //Connexion bdd
            $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
            $db = new mysqli("localhost","root","","web p2") or die("Erreur");
            $sql="SELECT HEUR_DEBUT,HEUR_FIN,ID_UTILISATEUR,calandrier.ID_CALANDRIER
            FROM calandrier
            INNER JOIN signature ON calandrier.ID_CALANDRIER = signature.ID_CALANDRIER
            AND ID_ROLE=2
            ORDER BY HEUR_FIN DESC, HEUR_DEBUT DESC,ID_PROFESSEUR ASC";
            
          
           
            $result= mysqli_query($db,$sql)or die('Erreur: '.mysqli_error());

            while ($row=mysqli_fetch_assoc($result))
            {
                $cal = $row['ID_CALANDRIER'];
                $sql2="SELECT *
                        FROM document
                        WHERE ID_CALANDRIER =1";
                        $result2= mysqli_query($link,$sql2)or die('Erreur: '.mysqli_error($link));
                        while ($row2=mysqli_fetch_assoc($result2))
                        {
                            $doc = $row2['ID_DOCUMENT'];
                        }
                echo"<form method=\"POST\" action=\"../GeneratePDF.php?document=$doc\">
                <tr>
                <td>{$row['HEUR_DEBUT']}</td>
                <td>{$row['HEUR_FIN']}</td>
                <td>{$row['ID_UTILISATEUR']}</td>
                <td><input class=\"favorite styled\" type=\"submit\" name=\"bouton\" value=\"Document PDF\"></td>
                </tr>\n
                </form>";
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