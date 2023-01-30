<?php
session_start() ;

if (isset($_SESSION['id'])){

?>
    <!-- Strat header  -->
      <?php
      include_once('./includes/Header.php') ;
      ?>
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
            $id = intval($_SESSION['id']) ;
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
                <table class="table-reservation">
                    <thead>
                        <th>N resevation</th>
                        <th>Date reserve</th>
                        <th>Date début </th>
                        <th>Date fin </th>
                        <th>Vihcule </th>
                        <th>Contrat </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1200</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>Dacia</td>
                            <td><a class="btn-download" href="#">Telecharger</a></td>
                        </tr>
                        <tr>
                            <td>1200</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>Dacia</td>
                            <td><a class="btn-download" href="#">Telecharger</a></td>
                        </tr>
                        <tr>
                            <td>1200</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>12-01-2023</td>
                            <td>Dacia</td>
                            <td><a class="btn-download" href="#">Telecharger</a></td>
                        </tr>
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
