<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit;
}


$user_query = mysqli_query($conn, "SELECT * FROM `utilisateur` WHERE id = '$user_id'") or die('Erreur de requête utilisateur');
$user_data = mysqli_fetch_assoc($user_query);

if (!$user_data) {
    die('Utilisateur non trouvé');
}

$nom = $user_data['nom'];
$email = $user_data['email'];
$location = $user_data['location'];


$cart_query = mysqli_query($conn, "SELECT * FROM `panier` WHERE user_id = '$user_id'") or die('Erreur de requête panier');
if (mysqli_num_rows($cart_query) > 0) {
    while ($cart_item = mysqli_fetch_assoc($cart_query)) {
        $product_name = $cart_item['nom'];
        $product_price = $cart_item['prix'];
        $product_image = $cart_item['image'];
        $product_quantity = $cart_item['quantite'];

        
        mysqli_query($conn, "INSERT INTO `commande` (user_id, nom, email, location, nom_art, prix, image, quantite) 
            VALUES ('$user_id', '$nom', '$email', '$location', '$product_name', '$product_price', '$product_image', '$product_quantity')") 
            or die('Erreur lors de l\'insertion dans la table commande');
    }

    
    mysqli_query($conn, "DELETE FROM `panier` WHERE user_id = '$user_id'") or die('Erreur lors de la suppression du panier');

    echo "<script>alert('Commande confirmée avec succès !'); window.location.href = 'homeclient.php';</script>";
} else {
    echo "<script>alert('Votre panier est vide !'); window.location.href = 'panier.php';</script>";
}
?>