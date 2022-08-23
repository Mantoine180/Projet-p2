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
        <tr><td>Horaire</td><td>Cours</td><td>Validation</td></tr>
        <?php
                
            //Connexion bdd
            $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
            $db = new mysqli("localhost","root","","web p2") or die("Erreur");
            $sql="SELECT * FROM calandrier";
            $result= mysqli_query($db,$sql)or die('Erreur: '.mysqli_error());
            
            date_default_timezone_set('Europe/Paris');
            $date = date('d-m-y h:i:s');
            echo $date;

            /*while ($row=mysqli_fetch_assoc($result))
            {

                if()
                    echo"<tr>
                    <td>{$row['NOM']}</td>
                    <td>{$row['PRENOM']}</td>
                    <td>{$row['EMAIL']}</td>
                    <td><button class=\"favorite styled\" type=\"button\">Présent</button></td>
                    </tr>\n";
            }*/
                    
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