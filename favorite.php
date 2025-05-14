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
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `favorite` WHERE id = '$remove_id'") or die('erreur de query');
    header('location:favorite.php');
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
        .delete{
            padding: 7px 20px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-family: "Encode Sans Expanded", sans-serif;
        }
    </style>
</head>
<body>
    <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <p>Favorite</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                $result = mysqli_query($conn, "SELECT * FROM favorite WHERE user_id = '$user_id'");      
                while($row = mysqli_fetch_array($result)){
            ?>
            <div class="product-card">
                <div class="card">
                    <img class="card-img" src="admin/<?php echo $row['image']; ?>" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nom']; ?></h5>
                        <p class="card-price"><?php echo $row['prix']; ?></p>
                        <form method="post" action="">
                            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['nom']; ?>">
                            <input class="price" type="hidden" name="product_price" value="<?php echo $row['prix']; ?>">
                        </form>
                        <a class="delete" href="favorite.php?remove=<?php echo $row['id']; ?>" class="delete-btn" >annuler favorite</a>
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