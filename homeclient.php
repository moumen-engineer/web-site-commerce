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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>WOLFIT</title>
    <style>
        body{
            margin: 0px;
            height: auto;
            font-family: "Jaro";
        }
        header {
            display: flex;
            width: 100%;
            background-color: white;
            padding: 10px;
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
        .Recherche{
            position: relative;
            right: 60px;
            
        }
        .Recherche button{
            position: relative;
            top: -35px;
            right: -170px;
            height: 34px;
            width: 40px;
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
        section{
            display: grid;
            grid-template-columns: repeat(3,1fr); 
        }
        section img {
            width: 100%;
            height: 100%;
        }
        .clothers{
            grid-area: 1/2/3/3;
        }
        .HISTOIRES{
            display: flex;
            width: 100%;
            height: 530px;
            text-align: center;
            background-color: black;
            color: white; 
            justify-content: center;
        }
        .HISTOIRES p {
            width: 70%;
            text-align: center;
            height: auto;
            font-size: 25px;
        }
        .info_us{
            width: 100%;
            height: 600px;
            display: flex;
            background-color: #FEEDED;
        }
        .info_us div {
            width: 100%;
            font-size: 32px;
            padding-left: 20px;

        }
        .info_us div img {
            position: relative;
            left: 100px;
            width: 50px;
            height: 50px;
        }
        input{
            width: 160px;
            height: 30px;
        }
        .black_logo{
            position: relative;
            top: 472px;
            right: 580px;
        }
        .photo-container {
            display: flex;
            overflow-x: auto; 
            scroll-behavior: smooth; 
            white-space: nowrap; 
            padding: 10px;
            gap: 10px; 
        }

        .photo-container img {
            max-height: 500px; /* Ajuste la hauteur des images */
            object-fit: cover; /* Coupe les images si nécessaire pour les ajuster */
            border-radius: 8px; /* Ajoute des bords arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ajoute une ombre */
            cursor: pointer; /* Curseur survol des images */
        }

        .photo-container::-webkit-scrollbar {
            height: 8px; 
        }

        .photo-container::-webkit-scrollbar-thumb {
            background-color: #888; 
            border-radius: 10px; 
        }

        .photo-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
        p{
            width: 70%;
            text-align: center;
            height: auto;
            font-size: 35px;  
        }   
        .map-container {
            width: 42%;            
            height: 80%;            
            max-width: 1200px;      
            border: 7px black; 
            border-radius: 8px;     
            overflow: hidden;       
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        /* From Uiverse.io by wilsondesouza */ 
        ul {
        list-style: none;
        }

        .example-2 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        }
        .example-2 .icon-content {
        margin: 0 10px;
        position: relative;
        padding: 0.5rem;
        }
        .example-2 .icon-content .tooltip {
        position: absolute;
        top: 100%;
        right: 110%;
        transform: translateY(200%);
        color: #fff;
        padding: 6px 10px;
        border-radius: 5px;
        opacity: 0;
        visibility: hidden;
        font-size: 14px;
        transition: all 0.3s ease;
        }
        .example-2 .icon-content:hover .tooltip {
        opacity: 1;
        visibility: visible;
        top: -50px;
        }
        .example-2 .icon-content a {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        color: #4d4d4d;
        background-color: #fff;
        transition: all 0.3s ease-in-out;
        }
        .example-2 .icon-content a:hover {
        box-shadow: 3px 2px 45px 0px rgb(0 0 0 / 12%);
        }
        .example-2 .icon-content a svg {
        position: relative;
        z-index: 1;
        width: 30px;
        height: 30px;
        }
        .example-2 .icon-content a:hover {
        color: white;
        }
        .example-2 .icon-content a .filled {
        position: absolute;
        top: auto;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        background-color: #000;
        transition: all 0.3s ease-in-out;
        }
        .example-2 .icon-content a:hover .filled {
        height: 100%;
        }

        .example-2 .icon-content a[data-social="linkedin"] .filled,
        .example-2 .icon-content a[data-social="linkedin"] ~ .tooltip {
        background-color: #0274b3;
        }

        .example-2 .icon-content a[data-social="github"] .filled,
        .example-2 .icon-content a[data-social="github"] ~ .tooltip {
        background-color: #24262a;
        }
        .example-2 .icon-content a[data-social="instagram"] .filled,
        .example-2 .icon-content a[data-social="instagram"] ~ .tooltip {
        background: linear-gradient(
            45deg,
            #405de6,
            #5b51db,
            #b33ab4,
            #c135b4,
            #e1306c,
            #fd1f1f
        );
        }
        .example-2 .icon-content a[data-social="youtube"] .filled,
        .example-2 .icon-content a[data-social="youtube"] ~ .tooltip {
        background-color: #ff0000;
        }
        .modal {
            display: block; /* Afficher la modale */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            overflow: auto;
        }

        .modal-content {
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%; /* Largeur de la modale */
            max-width: 400px;
            text-align: center;
        }

        .modal img {
            max-width: 100%; /* Image responsive */
            height: auto;
            margin-bottom: 15px;
        }

        .modal h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: black;
        }

        .modal p {
            font-size: 16px;
            margin-left:60px;
            color: black;
        }

        /* Style de fermeture */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .close-btn:hover {
            color: red;
        }
        .fermer{
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"><img src="Images/Logoblack.png" alt=""></div>
        <div>Chausseur</div>
        <div><a href="hommes.php">Hommes</a></div>
        <div>Femmes</div>
        <div>Enfants</div>
        <div>Sports</div>
        <div class="Recherche">
            <form action="homeclient.php" method="GET">
                <input type="text" name="search" placeholder="Recherche un article">
                <button type="submit"></button>
            </form>
        </div>
        <?php
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                
                $query = "SELECT * FROM article WHERE nom LIKE '%$search%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="modal">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='modal-content'>";
                        echo "<img src='" . $row['image'] . "' >";
                        echo "<h2>" . $row['nom'] . "</h2>";
                        echo "<p>Prix: " . $row['prix'] . "</p>";
                        echo "<a class='fermer' href = 'homeclient.php'>fermer</a>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo '<div class="modal">';
                    echo "<div class='modal-content'>";
                    echo "<p>Aucun article trouvé.</p>";
                    echo "<a class='fermer' href = 'homeclient.php'>fermer</a>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        ?>
        <aside>
            <div class="user-profile">
                <?php
                    $select_user = mysqli_query($conn, "SELECT * FROM `utilisateur` WHERE id = '$user_id'") or die('erreur de query');
                    if(mysqli_num_rows($select_user) > 0){
                        $fetch_user = mysqli_fetch_assoc($select_user);
                    };
                ?>
                <div class="flex">
                    <a class="signout" href="homeclient.php?logout=<?php echo $user_id; ?>" onclick="return confirm('etes-vous sur de vouloir vous deconnecter ?');" class="delete-btn"><img src="Images/mancompte.png" alt=""></a>
                </div>
            </div>
            <div><a href="favorite.php"><img src="Images/heart1.png" alt=""></a></div>
            <div>
                <a href="panier.php"><img src="Images/panierlogo.png" alt=""></a>
            </div>
        </aside>
    </header>
    <section>
        <img class="black_white" src="Images/black_white.png" alt="">
        
        <img class="clothers" src="Images/clothers.png" alt="">
        <img class="shoes" src="Images/shoes.png" alt="">
        <img class="tenager" src="Images/tenager.png" alt="">
        <img class="modelist" src="Images/modelist.png" alt="">
    </section>
    
    <footer>
        <div class="HISTOIRES">
            <p>WOLFIT : DES TENUES DE SPORT, DU STYLE ET DE NOMBREUSES HISTOIRES DEPUIS 2024
            Le sport nous permet de rester en forme. D'ouvrir notre esprit. Et de nous rassembler.
            À travers le sport, nous avons le pouvoir de changer des vies. Que ce soit avec des histoires
            d'athlètes inspirants. Des conseils de pros pour te motiver. Ou des tenues de sport
            conçues avec les dernières technologies pour progresser et battre tes records.
            adidas équipe aussi bien le runner que le joueur de basketball, le fan de football que
            l'amateur de fitness. 
            Le randonneur qui aime s'échapper de la ville.
            Ou le professeur de yoga qui enseigne les différentes positions.
            On retrouve aussi les 3 bandes dans l'univers de la musique.
            Sur scène et dans les festivals.
            Nos vêtements de sport te permettent de rester concentrer avant le départ. 
            Pendant la course. Et sur la ligne d'arrivée. Nous sommes là pour soutenir les créateurs.
            Améliorer leurs performances.
            Leurs vies. Et changer le monde.WOLFIT, c’est bien plus que des vêtements de sport et de training.
            Nous nous associons aux meilleurs de l’industrie pour créer avec eux. 
            Nous offrons ainsi à nos fans les tenues de sport et le style dont ils ont besoin pour répondre
            à leurs besoins sportifs, 
            tout en gardant un esprit écoresponsable. 
            Nous sommes là pour soutenir les créateurs. Améliorer leur performance.
            Créer un changement. Et nous pensons à l'impact que nous avons sur notre monde.</p>

            <div class="black_logo"><img src="Images/logowhite.png" alt="" width="50px"></div>
        </div>
        <div class="photo-container">
            <img src="Images/container1.png" alt="Photo 1">
            <img src="Images/container2.png" alt="Photo 2">
            <img src="Images/container3.png" alt="Photo 3">
            <img src="Images/container4.png" alt="Photo 4">
            <img src="Images/ballonchampions.png" alt="Photo 5">
        </div>
        <center>
            <br><p>vous pouvez trouver notre position en utilisant la carte maps !</p><br>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2778.993732300942!2d3.4744575532063546!3d36.75378025159962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e68eb5c555555%3A0x6538bed74e7d2536!2sCentre%20Commercial%20TITANIC!5e0!3m2!1sfr!2sdz!4v1734869564496!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <br><br>
            <div><img src="Images/Logoblack2.png" alt="" width="160px"></div>
        </center>
        <br>     
        <div class="info_us">
            <div>
                <h3>PRODUITS</h3>
                <h4>Chausseur</h4>
                <h4>vetements</h4>
                <h4>Accessoires</h4>
                <h4>Nouveautes</h4>
                <h4>Calendrier de sorties</h4>
                <h4>Outlet</h4>
            </div>
            <div>
                <h3>SPORTS</h3>
                <h4>Football</h4>
                <h4>Besketball</h4>
                <h4>Golf</h4>
                <h4>Training</h4>
                <h4>Tennis</h4>
                <h4>Rugby</h4>
            </div>
            <div>
                <h3>
                    NOS 
                    INITIATIVES
                </h3>
                <h4>Impact</h4>
                <h4>L’humain</h4>
                <h4>La planete</h4>
            </div>
            <div>
                <h3>INFORMATIONS D'ENTREPRISE</h3>
                <h4>qui sommes nous ?</h4>
                <h4>Application mobile</h4>
            </div>
            <div>
                <h3>SUIVEZ-NOUS</h3>
                <ul class="example-2">
                <li class="icon-content">
                    <a
                    href="https://linkedin.com/"
                    aria-label="LinkedIn"
                    data-social="linkedin"
                    >
                    <div class="filled"></div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-linkedin"
                        viewBox="0 0 16 16"
                        xml:space="preserve"
                    >
                        <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                        fill="currentColor"
                        ></path>
                    </svg>
                    </a>
                    <div class="tooltip">LinkedIn</div>
                </li>
                <li class="icon-content">
                    <a href="https://www.github.com/" aria-label="GitHub" data-social="github">
                    <div class="filled"></div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-github"
                        viewBox="0 0 16 16"
                        xml:space="preserve"
                    >
                        <path
                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"
                        fill="currentColor"
                        ></path>
                    </svg>
                    </a>
                    <div class="tooltip">GitHub</div>
                </li>
                <li class="icon-content">
                    <a
                    href="https://www.instagram.com/"
                    aria-label="Instagram"
                    data-social="instagram"
                    >
                    <div class="filled"></div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-instagram"
                        viewBox="0 0 16 16"
                        xml:space="preserve"
                    >
                        <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                        fill="currentColor"
                        ></path>
                    </svg>
                    </a>
                    <div class="tooltip">Instagram</div>
                </li>
                <li class="icon-content">
                    <a href="https://youtube.com/" aria-label="Youtube" data-social="youtube">
                    <div class="filled"></div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-youtube"
                        viewBox="0 0 16 16"
                        xml:space="preserve"
                    >
                        <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"
                        fill="currentColor"
                        ></path>
                    </svg>
                    </a>
                    <div class="tooltip">Youtube</div>
                </li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>