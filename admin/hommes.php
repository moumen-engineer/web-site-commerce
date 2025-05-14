<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>admin | hommes</title>
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
        .main {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px 40px;
            width: 400px;
            text-align: center;
            margin-top: 100px;
        }

        .main h2 {
            color: #000;
            margin-bottom: 20px;
        }
        .main div {
            margin-bottom: 15px;
            text-align: left;
        }

        .main span {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .main input[type="text"], 
        .main input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .main label {
            display: inline-block;
            margin-top: 10px;
            color:rgb(6, 6, 6);
            cursor: pointer;
            font-size: 20px;
        }

        .main button {
            background-color: #000;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .main button:hover {
            background-color: rgb(42, 102, 255);
        }
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .card {
            background-color: #ffffff;
            width: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease;
            margin-top: 200px;
            margin-left: 20px;
            margin-right: 20px
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 2px solid #000;
        }

        .card-body {
            padding: 5px;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin: 10px 0;
        }

        .card-text {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            border-radius: 5px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }
        .card-header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 10px; 
            margin-right: 40px;
            margin-left: 40px;
        }
        .cards-container {
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center; 
            gap: 20px; 
            margin: 20px;
        }

    </style>
</head>
<body>
    <center>
        <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>Hommes</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="homeadmin.php"><img src="Images/home.jpg" alt="" width="40px"></a>
            <aside>
                <div class="logo"><img src="Images/logowhite.png" alt="" ></div>
            </aside>
        </header>
        <div class="main">
            <main>
                <form action="insert.php" method="post"  enctype = "multipart/form-data">    <!--- une nouvelle page appeler insert pour inserer le nom et prix et image de produit--->
                    <h2>ajouter des articles</h2>          <!-- enctype = pour on peut importer les images --->
                    <div>
                        <span>nom :</span>
                        <input type="text" name='name'>
                    </div>
                    <br>        <!--- soter la ligne --->
                    <div>
                        <span>Prix  :</span>                                   
                        <input type="text" name='price'>
                    </div> 
                    <input type="file" id="file" name="image" style='display:none;'>    <!--- hide file by display:none --->
                    
                    <center>
                        <img src="Images/photosicon.png" width="30px"></img>
                    </center>
                    <label for="file">importer la photo de l'article</label>
                    <br><br>
                    <button name='upload'>ajouter l'article</button>
                    <br>
                </form>
            </main>
        </div>
    </center>
    <div class="cards-container">
     
        <?php
        include("config.php"); // bach n'dro n'utilisiw la variable $con
        $result = mysqli_query($con ,"SELECT * FROM article");   //appeler tout les produit from la table prod depuis la bdd dans la var $con
        while($row = mysqli_fetch_array($result)){  // parcourir tout les produit (produit par produit dans la bdd)
            echo "
                    <main>
                        <div class='card' style='width: 18rem;'>
                            <img src='$row[image]'' class='card-img-top' >   
                            <div class='card-body'>
                                <div class = 'card-header'>
                                    <h5 class='card-title'>$row[nom]</h5>
                                    <p class='card-text'>$row[prix]</p>
                                </div> 
                                <a href='delete.php? id=$row[id]' class='btn btn-danger'>supprimer l'article</a>    
                                <a href='update.php?  id=$row[id]' class='btn btn-warning'>Modification de l'article</a>
                            </div>
                        </div>
                    </main>
            ";
        }
        ?>
</body>
</html>
