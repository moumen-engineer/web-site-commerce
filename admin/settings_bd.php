<?php

include ("config.php");

$sql = "SELECT TABLE_NAME, TABLE_ROWS, DATA_LENGTH 
        FROM INFORMATION_SCHEMA.TABLES           
        WHERE TABLE_SCHEMA = 'marque_vet'";  // yafficher les informations 3la les table te3 la base de donnees

$result = $con->query($sql);


$process_sql = "SHOW PROCESSLIST";    //yafficher les processus actifs

$process_result = $con->query($process_sql);


$memory_sql = "SHOW STATUS LIKE 'Innodb_buffer_pool%'";    //consommation memoire et d'autre info

$memory_result = $con->query($memory_sql);


session_start();    //tbda la session


$response_time = isset($_SESSION['response_time']) ? $_SESSION['response_time'] : 0;   // yaffecter la valeur te3 response_time
$reponsetime_insert = isset($_SESSION['reponsetime_insert']) ? $_SESSION['reponsetime_insert'] : 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="precon$conect" href="https://fonts.googleapis.com">
    <link rel="precon$conect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>admin | parametres</title>
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
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 2s ease-out forwards; 
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            margin-top: 40px;
            text-align: center;
        }

        .center-container {
            max-width: 1200px;
            margin: 20px;
            padding: 20px;
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        section{
            margin-left: 150px;
            margin-right: 150px;
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


    </style>
</head>
<body>
    <?php
        if ($response_time > 0.0001) { 
            echo "<script>alert('Le temps de réponse est trop élevé : $response_time secondes');</script>";
        }
        
        if ($reponsetime_insert > 1) {  
            echo "<script>alert('Le temps de réponse est trop élevé : $reponsetime_insert secondes');</script>";
        }
    ?>
                    
    <center>
        <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>parametres</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="homeadmin.php"><img src="Images/home.jpg" alt="" width="40px"></a>
            <aside>
                <div class="logo"><img src="Images/logowhite.png" alt="" ></div>
            </aside>
        </header>
        <section>
            <h2>Statistiques sur les tables :</h2>
            <table border="1">
                <tr>
                    <th>Nom de la Table</th>
                    <th>Lignes</th>
                    <th>Taille des Données (octets)</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['TABLE_NAME'] . "</td>
                                <td>" . $row['TABLE_ROWS'] . "</td>
                                <td>" . $row['DATA_LENGTH'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune donnée disponible</td></tr>";
                }
                ?>
            </table>

            <h2>Processus actifs :</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Utilisateurs</th>
                    <th>Commande</th>
                    <th>État</th>
                </tr>
                <?php
                if ($process_result->num_rows > 0) {
                    while ($row = $process_result->fetch_assoc()) {
                        if ($row['db'] == 'marque_vet') {
                            echo "<tr>
                                    <td>" . $row['Id'] . "</td>
                                    <td>" . $row['User'] . "</td>
                                    <td>" . $row['Command'] . "</td>
                                    <td>" . $row['State'] . "</td>
                                </tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun processus actif</td></tr>";
                }
                ?>
            </table>

            <h2>Utilisation de la mémoire :</h2>
            <table border="1">
                <tr>
                    <th>Statut</th>
                    <th>Valeur</th>
                </tr>
                <?php
                if ($memory_result->num_rows > 0) {
                    while ($row = $memory_result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Variable_name'] . "</td>
                                <td>" . $row['Value'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Aucune donnée sur la mémoire disponible</td></tr>";
                }
                ?>
            </table>
            <h3>temps de réponse de quelque requete :</h3>
            <table border="1">
                <tr>
                    <th>la requete</th>
                    <th>temps de réponse</th>
                </tr>
                <?php
                    
                    echo "<tr>
                            <td>DELETE FROM article WHERE id=ID</td>
                            <td>" .$response_time. "</td>
                        </tr>
                        <tr>
                            <td>INSERT INTO article (nom ,prix ,image) VALUES ('NAME', 'PRICE', 'image_up')</td>
                            <td>" .$reponsetime_insert. "</td>
                        </tr>";
                ?>
            </table>
        </section>

    </center>
</body>
</html>