<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inscription et connexion</title>
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
    <div class="container-login100" style="background-color:rgb(255,255,255) ;">
        <?php

            $name=$_POST["name"];
            $firstname=$_POST["firstname"];
            $email=$_POST["email"];
            $age=$_POST["age"];
            $codepostal=$_POST["codepostal"];
            $town=$_POST["town"];
            $phone=$_POST["phone"];


            $conn =new mysqli('localhost','root','','formulaire');
            if($conn->connect_error)
            {
                die('Connection Failed: '.$conn->connect_error);
            }else{
                $stmt=$conn->prepare("insert into utilisateurs(nom,prenom,email,code_postal,âge,téléphone,ville)
                values(?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssiss",$name,$firstname,$email,$codepostal,$age,$phone,$town);
                $stmt->execute();
                $result= mysqli_query($conn,"SELECT* FROM utilisateurs");
        ?>
    <div class="tableau">
        <table border="1" >
        <thead>
            <tr>
                <td><strong>Nom</strong></td>
                <td><strong>Prénom<strong></td>
                <td><strong>email<strong></td>
                <td><strong>Âge<strong></td>
                <td><strong>Code postal</strong></td>
                <td><strong>Ville</strong></td>
                <td><strong>Téléphone</strong></td>     
            </tr>
        </thead>
        <tbody>
        <?php
                while($row=mysqli_fetch_array($result))
                {
        ?>
        <tr>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['âge'] ?></td>
            <td><?php echo $row['code_postal'] ?></td>
            <td><?php echo $row['ville'] ?></td>
            <td><?php echo $row['téléphone'] ?></td>

        </tr> 
        
        <?php
                }     
        
            }
         ?>
         </tbody>  
        </table>
    </div>
    </div>
</body>
</html>

        

