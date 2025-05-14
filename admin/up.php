<?php

include("config.php");  


if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];         //post signifie met dans la base de donnees
    $PRICE = $_POST['price'];                       
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name;
    $update = "UPDATE article SET nom='$NAME' , prix='$PRICE', image='$image_up' WHERE id=$ID";   // moodifier les information du produit a la table prod de la bdd
    mysqli_query($con , $update);

    if(move_uploaded_file($image_location, "Images/".$image_name)){
        echo "<script>alert('l article a été téléchargé avec succès ')</script>";
    }else{
        echo "<script>alert('un problème est survenu, l article n'a pas été téléchargé')</script>";
    }
    header('location: hommes.php');  //cette fonction pour retourner a la page index.php automatiquement quand on import le produit (rester dans la page index.php)
}

?>