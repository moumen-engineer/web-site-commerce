<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>admin home</title>
    <style>
        body{
            margin: 0px;
            height: auto;
            font-family: "Jaro";
            background: rgb(255, 255, 255);
        }
        .modal {
            display: none;  
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);  
            overflow: auto;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            animation: fadeIn 0.3s ease-in-out; /* Animation d'apparition */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        .main form {
            display: flex;
            flex-direction: column;
        }

        form div {
            margin-bottom: 15px;
        }

        form input {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            padding: 10px;
            background-color:rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 50px;
            margin-right: 50px;
        }

        form button:hover {
            background-color:rgb(49, 102, 249);
        }
        
    </style>
</head>
<body>
    <?php
        include("config.php");
        $ID = $_GET['id'];
        $up = mysqli_query($con ,"SELECT * FROM article WHERE id=$ID");
        $data = mysqli_fetch_array($up);
    ?>
    </div>
        <div id="modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close">&times;</a>
            
            <div class="main">
                <center>
                    <form action="up.php" method="post"  enctype = "multipart/form-data">    <!--- une nouvelle page appeler up pour modifier le nom et prix et image de produit--->
                        <h2>modifier l'article</h2>          <!-- enctype = pour on peut importer les images --->
                        <br>
                        <div>
                        <span>id :</span>
                            <input class="inputid" type="text" name='id' value = '<?php echo $data['id']?>'>
                        </div>
                        <div>
                            <span>Nom :</span>
                            <input class="inputname" type="text" name='name' value = '<?php echo $data['nom']?>'>
                        </div>
                        <br> 
                        <div>
                            <span>Prix :</span>
                            <input class="inputprice" type="text" name='price' value = '<?php echo $data['prix']?>'>
                        </div>                                    <!--- soter la ligne --->
                        <br>
                        <input type="file" id="file" name="image" style='display:none;'>    <!--- hide file by display:none --->
                        <br>
                        <label for="file">importer l'image de l'article</label>
                        <br><br>
                        <button name='update'>modifier l'article</button>
                        <br>
                    </form>
                </center>
            </div> 
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById('modal').style.display = 'flex';
        }

        document.querySelector('.close').onclick = function() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
</body>
</html>