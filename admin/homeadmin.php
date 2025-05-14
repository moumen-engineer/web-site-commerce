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
            background: rgb(24, 24, 24);
        }
        header {
            display: flex;
            width: 100%;
            background-color: white;
            padding: 20px;
            font-size: 30px;  
        }
        header div {
            width: 70%;
        }
        header div:hover{
            color: blue;
            cursor: pointer;
        }
        header .logo {
            width: 27%;
        }
        header .logo img{
            width: 70px;
            height: 70px;
        }
        header aside{
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
        aside div img{
            height: 50px;
            width: 50px;
        }
        p{
            font-size: 120px;
            color: white;
        }
        h1{
            font-size: 50px;
            color: white;
            font-family: italic;
        }
    </style>
</head>
<body> 
    <center>
        <header>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div>Chausseur</div>
            <div>
                <a href="hommes.php" alt="aller a la page de hommes">Hommes</a>
            </div>
            <div>Femmes</div>
            <div>Enfants</div>
            <div>Sports</div>
            <aside>
                <div><a href="commands.php"><img src="Images/commands.png" alt=""></a></div>
                <div><a href="settings_bd.php"><img src="Images/database_parametresblack.png" alt=""></a></div>
            </aside>
        </header> 
        <br><br>
        <p>wolfit</p>
        <h1>panneau de controle administrateur</h1>
    </center> 
</body>
</html>