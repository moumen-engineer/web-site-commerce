<?php

include 'config.php';

if(isset($_POST['submit'])){
   
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $location = mysqli_real_escape_string($conn, $_POST['location']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `utilisateur` WHERE email = '$email' AND password = '$pass'") or die('erreur de query');

   if(mysqli_num_rows($select) > 0){
      $message[] = "l'utilisateur exist déjà !";
   }else{
      mysqli_query($conn, "INSERT INTO `utilisateur`(nom, location, email, password) VALUES('$name', '$location', '$email', '$pass')") or die('erreur de query');
      $message[] = 'la connection a été effectué avec succès!';
      header('location:login.php');
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <title>creer un compte</title>
   <style>
      body{
         background-color:rgb(255, 255, 255); 
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
         font-family: "Jaro";
      }
      .form-container {
         background-color: rgb(255, 255, 255); 
         padding: 40px;
         width: 100%;
         max-width: 400px; /* Limiter la largeur pour que le formulaire ne soit pas trop large */
         border-radius: 8px; /* Coins arrondis pour une apparence moderne */
         box-shadow: 5px 5px 6px 8px rgba(31, 30, 30, 0.1); /* Ombre douce autour du formulaire */
         text-align: center; /* Centrer le texte */
         animation: fadeInUp 2s ease-out forwards;
      }

      /* Titre du formulaire */
      .form-container h3 {
         font-size: 24px;
         margin-bottom: 20px;
         color: #333; /* Couleur du texte */
         font-family: "Jaro";
      }

      /* Style des champs de saisie */
      .form-container .box {
         width: 100%;
         padding: 12px;
         margin: 10px 0;
         border: 1px solid #ccc;
         border-radius: 4px; /* Coins arrondis */
         font-size: 16px;
         box-sizing: border-box; /* Assurer que la largeur inclut le padding */
         transition: border 0.3s ease; /* Transition pour les changements de bordure */
      }

      /* Changer la bordure du champ de saisie au focus */
      .form-container .box:focus {
         border-color:rgb(0, 0, 0); /* Bordure verte au focus */
         outline: none; /* Retirer l'outline par défaut */
      }

      /* Style du bouton de soumission */
      .form-container .btn {
         width: 100%;
         padding: 14px;
         background-color:rgb(0, 0, 0); /* Couleur de fond verte */
         color: white;
         font-size: 16px;
         border: none;
         border-radius: 4px; /* Coins arrondis */
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      /* Changer la couleur du bouton au survol */
      .form-container .btn:hover {
         background-color:rgb(42, 87, 251); /* Vert légèrement plus foncé */
      }

      /* Style du texte sous le formulaire */
      .form-container p {
         font-size: 14px;
         color: #777;
      }

      /* Style du lien pour "nouveau compte" */
      .form-container p a {
         color:rgb(84, 84, 84); /* Couleur verte pour le lien */
         text-decoration: none;
         font-weight: bold;
      }

      /* Ajouter un effet au survol du lien */
      .form-container p a:hover {
         text-decoration: underline;
      }
      p{
         font-size: 60px;
      }
      @keyframes fadeInUp {
         from {
            opacity: 0;
            transform: translateY(20px);
         }
         to {
            opacity: 1;
            transform: translateY(0);
         }
      }
      img{
         position: relative;
         animation: fadeInUp 2s ease-out forwards;
      }
   </style>
</head>
<body>
   <center>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message" onclick="this.remove();">'.$message.'</div>';   
         }
      }
      ?>
      <br>
      <div class="form-container">
         <form action="" method="post">
            <h3>créer un nouveau compte</h3>
            <input type="text" name="name" required placeholder="nom d'utilisateur" class="box">
            <input type="text" name="location" required placeholder="localisation" class="box">
            <input type="email" name="email" required placeholder="Email" class="box">
            <input type="password" name="password" required placeholder="mot de passe" class="box">
            <input type="password" name="cpassword" required placeholder="confirmez le mot de passe" class="box">
            <input type="submit" name="submit" class="btn" value="entregistrement de compte">
            <p>Avez-vous un compte ? <a href="login.php">connection</a></p>
         </form>
      </div>
   </center>
</body>
</html>