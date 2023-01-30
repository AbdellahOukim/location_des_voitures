<?php
session_start() ;

if (isset($_SESSION['id'])) {

  header('location:index.php') ;
  exit() ;

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
        <h1>Bienvenue , connecter d'abord !</h1>
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
        <form>
          <div class="error"></div>
          <label for="email">Email :</label>
          <input required type="email" id="email" name="email" placeholder="Saisir votre email" />

          <label for="password">Mot de passe :</label>
          <input required type="password" id="password" name="password" placeholder="Saisir votre mot de passe" />

          <button type="submit">Se connecter</button>
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
        fetch('server/login.php' , {
          method : "post" ,
          body : formData 
        })
        .then((resp) => resp.json() )
        .then((data) => {
          if (data.err) {
            // error.style.display = "block" ;
            // error.textContent = data.content ;
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Email ou mot de passe incorrect ! ',
              showConfirmButton: false,
              timer: 2500
            })
          } else {
            document.location = "index.php" ;
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



