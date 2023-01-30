<?php
include('connectDB.php') ;

if(isset($_SESSION["id"])) {
$id = intval($_SESSION['id']) ;
$query = $conn->prepare("SELECT * FROM utilisateur WHERE ID_user = $id  ") ;
$query->execute() ;
$user = $query->fetch() ;
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Location des voiture</title>
    <link rel="stylesheet" href="template/css/styles.css" />
    <link rel="stylesheet" href="template/assets/font/font.css" />
    <script
      defer
      src="https://kit.fontawesome.com/6837580f7f.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="template/js/script.js"></script>
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <header data-header>
          <div class="container">
            <a href="./index.php">
              <img src="./template/assets/images/logo.png" alt="logo" class="logo" />
            </a>
            <nav>
            <?php
                if (isset($_SESSION['id'])) {
            ?>
              <a href="./profile.php">
                <span class="user-name" style="margin-right : 5px"><?= $user['Nom_user'] . " " . $user['Prenom_user']  ?></span>
                <i class="fa-solid fa-user-tie"></i>
              </a>
              <a href="logout.php">
                <span class="user-name" style="margin-right : 5px">Deconnecter</span>
                <i class="fa-solid fa-right-from-bracket"></i>
              </a>
            <?php
                }
                else {
            ?>
              <a href="./signup.php" class="btn btn-primary">S'inscrire</a>
              <a href="./login.php" class="btn btn-primary">Se connecter</a>
            <?php
            }
            ?>
            </nav>
            <button class="btn btn-toggler" data-toggler>
              <i class="fa-solid fa-bars"></i>
            </button>
          </div>
    </header>