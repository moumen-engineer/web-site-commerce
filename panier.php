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

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `panier` SET quantite = '$update_quantity' WHERE id = '$update_id'") or die('erreur de query');
   $message[] = 'la quantité du panier a été mise a jour avec succès !';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `panier` WHERE id = '$remove_id'") or die('erreur de query');
   header('location:panier.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `panier` WHERE user_id = '$user_id'") or die('erreur de query');
   header('location:panier.php');
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

      h3{
            margin-top: 35px;
            font-family: "Encode Sans Expanded", sans-serif;
            margin-bottom: 50px;
            font-size: 45px;
            color: white;
            text-decoration: bold;
        }
        main{
            width: 70%;
            border-radius: 10%;
        }
        table{
            box-shadow: 1px 1px 10px black;
            border-radius: 10px;
            width: 60%;
        }
        thead{
            background-color:  #2f2f2f;
            text-align: center;
            height: 50px;
        }
        tbody{
            text-align: center;
            background-color: white;
            height: 40%;
        }
        a{
            margin-top: 10px;
            margin-bottom: 1%;
            font-family: "Encode Sans Expanded", sans-serif;
        }
        th{
            color: white;
            text-decoration: bold;
            font-family: "Encode Sans Expanded", sans-serif;
        }
        .delete{
            padding: 7px 20px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-family: "Encode Sans Expanded", sans-serif;
        }
        .btn{
            padding: 7px 20px;
            background-color: green;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 10px;
            font-family: "Encode Sans Expanded", sans-serif;
        }
        .table-bottom{
            height: 50px;
        }
   </style>
</head>
<body>
    <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <p>panier</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="homeclient.php"><img src="Images/home.jpg" alt="" width="40px"></a>
        <aside>
            <div class="logo"><img src="Images/logowhite.png" alt="" ></div>
        </aside>
    </header><br><br>
    <center>
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
                }
            }
        ?>
        <br>
        <table>
        <thead>
            <th>image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total price</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php
            $cart_query = mysqli_query($conn, "SELECT * FROM `panier` WHERE user_id = '$user_id'") or die('erreur de query');
            $grand_total = 0;
            if(mysqli_num_rows($cart_query) > 0){
                while($fetch_cart = mysqli_fetch_assoc($cart_query)){
        ?>
            <tr>
                <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
                <td><?php echo $fetch_cart['nom']; ?></td>
                <td><?php echo $fetch_cart['prix']; ?>$ </td>
                <td>
                <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantite']; ?>">
                    <input type="submit" name="update_cart" value="Save" class="option-btn">
                </form>
                </td>
                <td><?php echo $sub_total = ($fetch_cart['prix'] * $fetch_cart['quantite']); ?>$</td>
                <td><a class="delete" href="panier.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove the item from the shopping cart ?');">supprimer</a></td>
            </tr>
        <?php
            $grand_total += $sub_total;
                }
            }else{
                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">le panier est vide</td></tr>';
            }
        ?>
        <tr class="table-bottom">
            <td colspan="4">le prix Totale:</td>
            <td><?php echo $grand_total; ?>$</td>
            <td><a class="delete" href="panier.php?delete_all" onclick="return confirm('supprimer tout les articles de panier');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">supprimer tout</a></td>
        </tr>
        </tbody>
        </table>
        <br>
        <form action="insertcommande.php" method="post" >
            <br>
            <button type="submit" class="btn">Confirmer la commande</button>
        </form>
        <br>
    <center>
</body>
