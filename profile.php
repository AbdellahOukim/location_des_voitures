<?php
session_start() ;
include('includes/connectDB.php') ;

if (isset($_SESSION['id'])){

$id = intval($_SESSION['id']) ;
$query = $conn->prepare("SELECT * FROM utilisateur WHERE ID_user = $id  ") ;
$query->execute() ;
$user = $query->fetch() ;
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
    <!-- Strat header  -->
    <header class="no-sticky" data-header>
          <div class="container">
            <a href="index.php">
              <img src="template/assets/images/logo-1.png" alt="logo" class="logo" />
            </a>
            <nav>
            <?php
                if (isset($_SESSION['id'])) {
            ?>
              <a href="profile.php">
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
    <!-- End header  -->
    <!-- Start hero  -->
    <div class="hero profile"></div>
    <!-- End hero  -->
    <!-- Start profile  -->
    <div class="profile-section">
        <div class="profile-image">
            <i class="fa-regular fa-user"></i>
        </div>
        <div class="profile-nav">
            <div class="container">
            <nav>
                <a class="active" data-target="reservation" href="#"><i class="fa-brands fa-researchgate"></i> <span>Mes reservation</span> </a>
                <a data-target="profile" href="#"> <i class="fa-regular fa-user"></i> <span>Edit profile</span> </a>
            </nav>
            </div>
        </div>
        <div class="edit-container">
            <!-- Start profile tab   -->
            <?php
            $profile_query = $conn->prepare("SELECT * FROM utilisateur WHERE ID_user = $id ") ;
            $profile_query->execute() ;
            $user = $profile_query->fetch() ;

            ?>
            <div data-section="profile" class="container section-tab ">
                <form action="">
                    <div class="row">
                        <label>Nom :</label>
                        <input name="nom" value="<?= $user['Nom_user'] ?>" type="text" placeholder="Nouveaux nom ...">
                    </div>
                    <div class="row">
                        <label>Prenom :</label>
                        <input name="prenom" value="<?= $user['Prenom_user'] ?>" type="text" placeholder="Nouveaux prenom ...">
                    </div>
                    <div class="row">
                        <label>Telephone :</label>
                        <input name="tel" value="<?= $user['tel'] ?>" type="text" placeholder="Nouveaux tel ...">
                    </div>
                    <div class="row">
                        <label>Email :</label>
                        <input name="email" value="<?= $user['email'] ?>" type="text" placeholder="Nouveaux tel ...">
                    </div>
                    <div class="row">
                        <label>Mot de passe :</label>
                        <input type="password" placeholder="Ancien Mot de passe ...">
                    </div>
                    <div class="row">
                        <label>Nouveaux Mot de passe :</label>
                        <input type="password" placeholder="Nouveaux Mot de passe ...">
                    </div>
                    <div class="row">
                        <label>Confirme mot de passe :</label>
                        <input type="password" placeholder=" Confirme mot de passe ...">
                    </div>
                    <button type="submit">Edite</button>
                </form>
            </div>
            <!-- End profile tab   -->

            <!-- Start reservation tab   -->
            <div data-section="reservation" class="container section-tab show">
                <?php
                $reserve_query = $conn->prepare("SELECT re.* , mar.Intitule_Marque  , er.Intitule_EtatRes
                 FROM reservation re , marque mar , voiture v , etat_res er
                 WHERE re.Id_EtatRes = er.Id_EtatRes AND re.Id_vehicule = v.Id_vehicule
                 AND mar.Id_marque = v.Id_marque AND ID_client = $id ORDER BY id_reservation  ") ;
                $reserve_query->execute() ;
                $reservations = $reserve_query->fetchAll() ;
                ?>
                <table class="table-reservation">
                    <thead>
                        <th>N resevation</th>
                        <th>Date reserve</th>
                        <th>Date début </th>
                        <th>Date fin </th>
                        <th>Vihcule </th>
                        <th>Etat</th>
                        <th>Contrat </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($reservations as $reservation){
                        ?>
                        <tr>
                            <td><?= $reservation['id_reservation'] ?></td>
                            <td><?= $reservation['date_Reservation'] ?></td>
                            <td><?= $reservation['DateDebutR'] ?></td>
                            <td><?= $reservation['DateFinR'] ?></td>
                            <td><?= $reservation['Intitule_Marque'] ?></td>
                            <td><?= $reservation['Intitule_EtatRes'] ?></td>
                            <td>
                                <?php if($reservation['Intitule_EtatRes'] == "success" ){ ?>
                                    <a class="btn-download" href="contrat.php?id=<?= $reservation['id_reservation'] ?>">Telecharger</a>
                                <?php } else {
                                    echo "--" ;
                                }
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End reservation tab   -->
        </div>
    </div>
    <!-- End profile  -->
    <!-- Start footer  -->
    <?php
      include_once('./includes/footer.php') ;
    ?>
    <!-- End footer  -->
  </body>
</html>

<?php
} else {
    header("location:login.php") ;
}
?>
