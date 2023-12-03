<?php
  session_start();
  require_once("includes/header.php")
  ?>


<!-- body tag open -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1>Battle of Classes</h1>
      <h2>Lorem ipsum dolor, sit amet consectetur adipisicing.</h2>
      <?php
        if(!isset($_SESSION["username"])){
          echo"<a href='login.php' class='btn-about'>Join Now</a>";
        }else{
          echo"<a href='play.php' class='btn-about'>Play Now</a>";
        }
      ?>

       <?php
            if((isset($_GET['validate']))&&($_GET['validate']=="true"))
            {
                echo '<p>&nbsp;</p><div class="alert alert-success w-50" role="alert">
              <strong>Hooray!</strong> Your account is now active !
            </div>';
            }
            if((isset($_GET['validate']))&&($_GET['validate']=="false"))
            {
                echo '<p>&nbsp;</p><div class="alert alert-danger  w-50" role="alert">
              <strong>Whoops</strong> Your account validation failed !
            </div>';
            }
         ?>

      </div>
  </section><!-- End Hero -->
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
</body>
</html>