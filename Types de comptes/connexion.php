<?php
    session_start();
    $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
    $db = new mysqli("localhost","root","","web p2") or die("Erreur");
    if(isset($_POST['name'])&& isset ($_POST['email'])&& isset ($_POST['password']))
    {

        $name=htmlspecialchars($_POST['name']);
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);

        
        $sql_role="SELECT ID_ROLE,ID_UTILISATEUR 
        FROM utilisateur
        WHERE NOM=\"$name\"
        AND EMAIL=\"$email\"
        AND MotDePasse=\"$password\"";
        $resultat=mysqli_query($link,$sql_role)or die('Erreur: '.mysqli_error($link));
        $result=mysqli_fetch_assoc($resultat);
        $_SESSION['ID_ROLE']=intval($result['ID_ROLE']);
        $_SESSION['ID_UTILISATEUR']=intval($result['ID_UTILISATEUR']);

        var_dump($result);
        var_dump($_SESSION);

        if ($_SESSION['ID_ROLE']==1)
        {
            header('Location: ../Elève/index.php');
        }
        
        else if($_SESSION['ID_ROLE']==2)
        {
            header('Location: ../Professeur/index.php');
        }
        
        else  if($_SESSION['ID_ROLE']==3)
        {
            header('Location: ../Admin/index.php');
        }

    }else header('Location:index.php');