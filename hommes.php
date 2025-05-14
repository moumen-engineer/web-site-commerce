<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `panier` WHERE nom = '$product_name' AND user_id = '$user_id'") or die('erreur de query');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = "l'article a déjà été ajouté au panier !";
   }else{
      mysqli_query($conn, "INSERT INTO `panier`(user_id, nom, prix, image, quantite) 
      VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('erreur de query');
      $message[] = "l'article est ajouté au panier !";
   }

};
if(isset($_POST['add_to_fav'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
 
    $select_fav = mysqli_query($conn, "SELECT * FROM `favorite` WHERE nom = '$product_name' AND user_id = '$user_id'") or die('erreur de query');
 
    if(mysqli_num_rows($select_fav) > 0){
       $message[] = "l'article est déjà dans vos favoris !";
    }else{
       mysqli_query($conn, "INSERT INTO `favorite`(user_id, nom, prix, image) VALUES('$user_id', '$product_name', '$product_price', '$product_image')") or die('erreur de query');
       $message[] = "l'article a été ajouté a vos favoris !";
    }
 
 };


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>client | hommes</title>
    <style>
        body{
            margin: 0px;
            height: auto;
            font-family: "Jaro";
            background: rgb(255, 255, 255);
        }
        header {
            display: flex;
            align-items: center; 
            justify-content: space-between; 
            width: 100%;
            background-color: black;
            padding: 10px; 
            box-sizing: border-box; 
        }
        header div {
            width: 70%;
            height: 63px;
            flex: 1;
        }
        header .logo {
            width: 27%;
            margin-left:1210px;
        }
        header .logo img{
            width: 50px;
            height: 50px;
        }
        header aside{
            display: flex;
            width: 100%;
            
        }
        aside div img{
            height: 50px;
            width: 50px;
        }
        p{
            color: white;
            font-size: 30px;
            margin: 0;
        }
        .products {
            padding: 50px;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            width: 80%;
            margin-top: 20px;
        }

        .product-card {
            display: flex;
            justify-content: center;
        }

        .card {
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .card-price {
            font-size: 1.1rem;
            color:rgb(0, 0, 0);
            margin-bottom: 20px;
        }

        form input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn-add-to-cart{
           width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }
        .btn-add-to-cart:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .box-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .box-container {
                grid-template-columns: 1fr;
            }
        }
        .btn-add-to-fav {
            width: 100%;
            padding: 10px;
            background-color: #ff6666; /* Rouge */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn-add-to-fav:hover {
            background-color: #e55a5a;
        }
    </style>
</head>
<body>
    <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <p>Hommes</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="homeclient.php"><img src="Images/home.jpg" alt="" width="40px"></a>
        <aside>
            <div class="logo"><img src="Images/logowhite.png" alt="" ></div>
        </aside>
    </header><br>
    <center>
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
                }
            }
        ?>
    </center>
    <br>
    <div class="products">
        <div class="box-container">
            <?php
                include('config.php');
                $result = mysqli_query($conn, "SELECT * FROM article");      
                while($row = mysqli_fetch_array($result)){
            ?>
            <div class="product-card">
                <div class="card">
                    <img class="card-img" src="admin/<?php echo $row['image']; ?>" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nom']; ?></h5>
                        <p class="card-price"><?php echo $row['prix']; ?></p>
                        <form method="post" action="">
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['nom']; ?>">
                            <input class="price" type="hidden" name="product_price" value="<?php echo $row['prix']; ?>">
                            <input type="submit" value="Add to Cart" name="add_to_cart" class="btn-add-to-cart">

                            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['nom']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $row['prix']; ?>">
                            <input type="submit" value="Ajouter aux favoris" name="add_to_fav" class="btn-add-to-fav">
                        </form>
                    </div>
                </div>
            </div>
            <?php
                };
            ?>
        </div>
    </div>
    
</body>
</html>