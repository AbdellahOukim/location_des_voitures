<?php
session_start() ;

if (isset($_SESSION['id'])) {
  header('location:index.php') ;
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
        <h1>S'inscrire avec nous maintenant !</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda,
          labore. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Eligendi, nulla!
        </p>
      </div>
    </div>
    <!-- End hero  -->
    <!-- start Sign up  -->
    <div class="signup">
      <div class="form-container">
        <form method="post" action="signup.php" >
          <div class="error"></div>
          <label for="nom">Nom :</label>
          <input required type="text" id="nom" name="nom" placeholder="Saisir votre nom" />

          <label for="prenom">Prenom :</label>
          <input required type="text" id="prenom" name="prenom"  placeholder="Saisir votre prenom"/>

          <label for="tel">Tel :</label>
          <input required type="text" id="tel" name="tel" placeholder="Saisir votre numero" />

          <label for="email">Email :</label>
          <input required type="email" id="email" name="email" placeholder="Saisir votre email" />

          <label for="password">Mot de passe :</label>
          <input required type="password" id="password" name="password" placeholder="Saisir votre mot de passe" />

          <label for="password"> Repeter le mot de passe :</label>
          <input required type="password" id="password" name="re-password" placeholder="Saisir votre mot de passe" />

          <button name="submit" type="submit">S'inscrire</button>
        </form>
      </div>
    </div>
    <!-- End Sign up  -->
    <!-- Start footer  -->
    <?php
      include_once('./includes/footer.php') ;
    ?>
    <!-- End footer  -->

    <script>
      const form = document.querySelector('form') ;
      const error = document.querySelector('.error') ;

      form.onsubmit = (e) => {
        e.preventDefault() ;
        const formData = new FormData(form) ;
        fetch('./server/signup.php' , {
          method : "post" ,
          body : formData 
        })
        .then((resp) => resp.json() )
        .then((data) => {
          if (data.err) {
            error.style.display = "block" ;
            error.textContent = data.content ;
          } else {
            document.location = "login.php" ;
          }
        } )
        .catch((err)=> console.log(err)) ;
      }
    </script>
  </body>
</html>
<?php
} ;

?>