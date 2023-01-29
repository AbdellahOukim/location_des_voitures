<?php
session_start() ;

if (isset($_SESSION['return_to'])){
  $return_to = $_SESSION['return_to'];
  unset($_SESSION['return_to']);
  header("location:$return_to");
  exit();
}
else {

?>
    <!-- Strat header  -->
      <?php
      include_once('./includes/Header.php') ;
      ?>
    <!-- End header  -->
    <!-- Start hero  -->
    <div class="hero">
      <div class="content">
        <h1>Bienvenue chez nous !</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda,
          labore. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Eligendi, nulla!
        </p>
      </div>
    </div>
    <!-- End hero  -->
    <!-- Start about  -->
    <div class="about">
      <div class="container">
        <h2 class="section-title">nous avantages</h2>
        <div class="about-content">
          <div class="about-card">
            <div class="icon">
              <i class="fa-regular fa-map"></i>
            </div>
            <h4>Voyager dans tous le maroc</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil
              pariatur, aut in ipsa omnis eum odit sit ut saepe. Corporis.
            </p>
          </div>
          <div class="about-card">
            <div class="icon">
              <i class="fa-solid fa-car"></i>
            </div>
            <h4>Meilleurs voitures pour vous</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil
              pariatur, aut in ipsa omnis eum odit sit ut saepe. Corporis.
            </p>
          </div>
          <div class="about-card">
            <div class="icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <h4>Services 24/24</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil
              pariatur, aut in ipsa omnis eum odit sit ut saepe. Corporis.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- End about  -->
    <!--Start cars  -->
    <div class="car-section">
      <div class="container">
        <h2 class="section-title">notre voitures</h2>
        <div class="cars-container">
          <!-- Card car  -->
          <?php
          $query = $conn->prepare("SELECT v.* , tm.Intitule_TypeMoteur , ma.Intitule_Marque
          FROM voiture v , typemoteur tm , marque ma WHERE v.Id_TypeMoteur = tm.Id_TypeMoteur
          AND ma.Id_marque = v.Id_marque LIMIT 6 ") ;
          $query->execute() ;
          $cars = $query->fetchAll()  ;
          foreach($cars as $car) :
          ?>
         <div class="car-card">
            <div class="card-image">
              <img src="upload/<?= $car['image'] ?>" alt="car-img" />
              <?php if ($car['en_promotion'] == 1) { ?>
              <p class="promotion">
                Promotion ! 
              </p>
              <?php
              }
              ?>
            </div>
            <div class="card-body">
              <div class="top">
                <h5><?= $car['Intitule_Marque'] ?></h5>
                <p class="year"> <?= $car['annee_achat'] ?> </p>
              </div>
              <div class="center">
                <div>
                  <span><i class="fa-solid fa-user-tie"></i></span>
                  <label><?= $car['Nbr_places'] ?> places</label>
                </div>
                <div>
                  <label>Manuel</label>
                  <span><i class="fa-solid fa-gamepad"></i></span>
                </div>
                <div>
                  <span><i class="fa-solid fa-gas-pump"></i></span>
                  <label><?= $car['Intitule_TypeMoteur'] ?></label>
                </div>
                <div>
                  <label>210 km/h</label>
                  <span><i class="fa-solid fa-gauge-simple-high"></i></span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="price">
              <p class="<?php echo $car['en_promotion'] == 1 ? 'deleted' : "" ?>">
                <?= $car['prix_parJour'] ?> DH / <span>jour</span> 
              </p>
              <?php
              if ($car['en_promotion'] == 1) {
              ?>
              <p>
                <?= $car['prix_Promotion'] ?> DH / <span>jour</span> 
              </p>
              <?php
              }
              ?>
              </div>
              <a class="btn-action" href="./single_car.php?id=<?= $car['Id_vehicule'] ?>">Decouvrire</a>
            </div>
          </div>
          <?php
          endforeach ;
          ?>
          <!-- Card car  -->
        </div>
        <a class="btn btn-voir" href="./cars.php">Voir tous</a>
      </div>
    </div>
    <!--End cars  -->
    <!-- Start footer  -->
    <?php
      include_once('./includes/footer.php') ;
    ?>
    <!-- End footer  -->
  </body>
</html>

<?php
} ;
?>
