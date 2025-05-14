<?php

include("config.php");  


if(isset($_POST['upload'])){
    $NAME = $_POST['name'];         //post signifie met dans la base de donnees
    $PRICE = $_POST['price'];                       
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name;

    session_start();

    $start_time = microtime(true);

    $insert = "INSERT INTO article (nom ,prix ,image) VALUES ('$NAME', '$PRICE', '$image_up')";   // ajouter les information du produit a la table prod de la bdd

    $end_time = microtime(true);


    $reponsetime_insert = $end_time - $start_time;

    $_SESSION['reponsetime_insert'] = $reponsetime_insert;

    mysqli_query($con , $insert);
    if(move_uploaded_file($image_location, "Images/".$image_name)){
        echo "<script>alert('l article a été téléchargé avec succès ')</script>";
    }else{
        echo "<script>alert('un problème est survenu, l article n'a pas été téléchargé')</script>";
    }
    header('location: hommes.php');  //cette fonction pour retourner a la page hommes.php automatiquement quand on import le produit (rester dans la page hommes.php)
}

?>