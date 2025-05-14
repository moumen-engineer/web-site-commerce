

<?php
include 'config.php';

if(isset($_GET['delete_all'])){
    mysqli_query($con, "DELETE FROM `commande`") or die('erreur de query');
    header('location:commands.php');
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
    <title>admin | commandes</title>
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
            margin-left:1150px;
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
            padding: 7px 7px;
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
    <center>
        <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>commandes</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="homeadmin.php"><img src="Images/home.jpg" alt="" width="40px"></a>
            <aside>
                <div class="logo"><img src="Images/logowhite.png" alt="" ></div>
            </aside>
        </header>
        <br>
        <table>
        <thead>
            <th>Nom</th>
            <th>Email</th>
            <th>Localisation</th>
            <th>image</th>
            <th>Nom d'article</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>le prix totale</th>
        </thead>
        <tbody>
        <?php
            $cmd_query = mysqli_query($con, "SELECT * FROM `commande`") or die('erreur de query');
            $grand_total = 0;
            if(mysqli_num_rows($cmd_query) > 0){
                while($fetch_cmd = mysqli_fetch_assoc($cmd_query)){
        ?>
            <tr>
                <td><?php echo $fetch_cmd['nom']; ?></td>
                <td><?php echo $fetch_cmd['email']; ?></td>
                <td><?php echo $fetch_cmd['location']; ?></td>
                <td><img src="<?php echo $fetch_cmd['image']; ?>" height="75" alt=""></td>
                <td><?php echo $fetch_cmd['nom_art']; ?></td>
                <td><?php echo $fetch_cmd['prix']; ?>$ </td>
                <td>
                <span><?php echo $fetch_cmd['quantite']; ?></span>
                </td>
                <td><?php echo $sub_total = ($fetch_cmd['prix'] * $fetch_cmd['quantite']); ?>$</td>
            </tr>
        <?php
            $grand_total += $sub_total;
                }
            }else{
                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">aucune commande disponible</td></tr>';
            }
        ?>
        <tr class="table-bottom">
            <td colspan="4">le profit totale de la journée:</td>
            <td><?php echo $grand_total; ?>$</td>
            <td><a class="delete" href="commands.php?delete_all" onclick="return confirm('supprimer tout la commande');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">supprimer commade</a></td>
        </tr>
        </tbody>
        </table>
        
        <br>
    </center>
</body>
</html>