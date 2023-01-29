<footer>
      <div class="container">
        <div class="description">
          <img class="logo" src="./template/assets/images/logo.png" alt="logo" />
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi ipsa
            explicabo sequi enim voluptatibus facilis!
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi ipsa
            explicabo sequi enim voluptatibus facilis!
          </p>
        </div>
        <div class="social-media">
          <h4>Social media</h4>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Whatsapp</a></li>
          </ul>
        </div>
        <div class="links">
          <h4>Links</h4>
          <ul>
            <li><a href="./index.php">Acceuille</a></li>
            <li><a href="./cars.php">Voitures</a></li>
            <?php if (isset($_SESSION['id'])) { ?>
            <li><a href="#">Mes reservation</a></li>
            <li><a href="./logout.php">Se deconnecter</a></li>
            <?php
            } else { ?>
            <li><a href="./signup.php">S'inscrire</a></li>
            <li><a href="./login.php">Se connecter</a></li>
            <?php 
            }
            ?>
          </ul>
        </div>
      </div>
      <p class="copy-right">Made with <i class="fa-solid fa-heart"></i>  by abdellah oukim 2023 ©</p>
</footer>