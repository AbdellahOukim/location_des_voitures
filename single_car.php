<?php
session_start() ;
if (isset($_SESSION["id"])) :
  if(!isset($_GET['id'])){
    header('location:index.php') ;
    exit() ;
  }
?>
    <!-- Strat header  -->
    <?php
        include_once('./includes/Header.php') ;
      ?>
    <!-- End header  -->
    <!-- Start hero  -->
    <div class="hero">
        <div class="content">
          <h1>Reserver maintanent !</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda,
            labore. Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eligendi, nulla!
          </p>
        </div>
      </div>
      <!-- End hero  -->
    <!-- Start reservation  -->
    <div class="product">
        <div class="container">
        <h2 class="section-title">Reserver !</h2>
        <!-- Car product  -->
        <?php
          $id = intval($_GET['id']) ;
          $query = $conn->prepare("SELECT v.* , tm.Intitule_TypeMoteur , ma.Intitule_Marque
          FROM voiture v , typemoteur tm , marque ma WHERE v.Id_TypeMoteur = tm.Id_TypeMoteur
          AND ma.Id_marque = v.Id_marque AND Id_vehicule = $id   ") ;
          $query->execute() ;
          $single_car = $query->fetch()  ;
        ?>
        <div class="product-container">
            <div class="product-image">
                <img src="upload/<?= $single_car['image'] ?>" alt="car">
            </div>
            <div class="product-infos">
                <div class="header">
                    <h4>Service information </h4>
                </div>
                <div class="body">
                    <div class="row">
                        <label>Prix par jour</label>
                        <p><?= $single_car['prix_parJour'] ?>  DH</p>
                    </div>
                    <?php if ($single_car['en_promotion'] == 1) { ?>
                    <div class="row">
                        <label>Prix en promotion </label>
                        <p><?= $single_car['prix_Promotion'] ?>  DH</p>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <label>Marque</label>
                        <p><?= $single_car['Intitule_Marque'] ?></p>
                    </div>
                    <div class="row">
                        <label>Moteur</label>
                        <p><?= $single_car['Intitule_TypeMoteur'] ?></p>
                    </div>
                    <div class="row">
                        <label>Anneés</label>
                        <p><?= $single_car['annee_achat'] ?> </p>
                    </div>
                </div>
                <div class="footer">
                  <form>
                    <div class="message"></div>
                    <input type="hidden" name="id_voiture" value="<?=intval($_GET["id"])?>">
                    <div class="dates">
                      <div>
                        <label>date debut * :</label><br>
                        <input type="date" name="date-start" data-date="start">
                      </div>
                      <div>
                        <label>date fin * :</label><br>
                        <input type="date" name="date-end" data-date="end">
                      </div>
                      <div>
                        <label>ville * :</label><br>
                        <select name="ville">
                          <?php
                            $query_ville = $conn->prepare("SELECT * FROM ville ") ;
                            $query_ville->execute() ;
                            $villes = $query_ville->fetchAll() ;
                            foreach ($villes as $ville){
                              ?>
                              <option value="<?= $ville['ID_ville'] ?>"><?= $ville["nom_ville"] ?></option>
                            <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="infos">
                      <div>
                        <label>Numeros passport :</label><br>
                        <input name="passport" type="text" placeholder="Numeros de passport" >
                      </div>
                      <div>
                        <label>Numeros permis * :</label><br>
                        <input name="permis" type="text" placeholder="Numeros de permis" >
                      </div>
                      <div>
                        <label>date validité * :</label><br>
                        <input type="date" name="date-valide" data-date="end">
                      </div>
                      
                    </div>
                    <button class="btn-reserver">Reserver</button>
                  </form>
                </div>
            </div>
        </div>

        <!-- Car product  -->

        </div>
    </div>
    <!-- End reservation  -->

    <!--Start cars  -->
    <div class="car-section">
      <div class="container">
        <h2 class="section-title">Voir aussi</h2>
        <div class="cars-container">
          <!-- Card car  -->
          <?php
          $query = $conn->prepare("SELECT v.* , tm.Intitule_TypeMoteur , ma.Intitule_Marque
          FROM voiture v , typemoteur tm , marque ma WHERE v.Id_TypeMoteur = tm.Id_TypeMoteur
          AND ma.Id_marque = v.Id_marque AND Id_vehicule <> $id   LIMIT 3 ") ;
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
    <script>
      const form = document.querySelector('form') ;
      const message = document.querySelector('.message') ;

      form.onsubmit = (e) => {
        e.preventDefault() ;
        const formData = new FormData(form) ;
        fetch('server/reservation.php' , {
          method : "post" ,
          body : formData 
        })
        .then((resp) => resp.json() )
        .then((data) => {
          if (data.err) {
            message.style.display = "block" ;
            message.className = "error" ;
            message.textContent = data.content ;
          } else {
            // redirect *
            message.style.display = "block" ;
            message.textContent = data.content ;
          }
        } )
        .catch((err)=> console.log(err)) ;
      }
    </script>
  </body>
</html>

<?php

else :
  $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
  header('Location:login.php') ;
  exit() ;
endif ;
?>
