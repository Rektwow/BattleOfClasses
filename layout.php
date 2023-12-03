<?php
  session_start();
  require_once("includes/auth_check.php");
  require_once("includes/header.php");
  require("class/FetchClass.php");
  ?>
<div class="m-0 p-0 w-100 h-100" style="background-image: url('assets/img/battleField.png'); background-size: cover; background-position: center;">

  <main id="main">
  
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>BATTLEGROUND</h2>
        </div>

          <div class="row">


            <div class="d-flex justify-content-between"  style="height: 575px;">

            <?php
                 error_reporting(0);
                 $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                 $test->PlayerData($_GET['p']); 
              ?>

                          <div class="d-flex flex-column align-items-center">
                            <img src="assets/img/vs.png" style="width: 100px;" alt="">
                            <p class="fs-2 fw-bold" style="color: black;">Choose an Ability</p>
                            <div id="battleMessage" class="fs-3 pt-5 mt-5 fw-bold" style="color: black;">Combat Text</div>
                            <div id="battleEnd" name="battleEnd" class="fs-1 fw-bold" style="color: black;">Victory/Defeat</div>
                            <button type="submit" id="submitGo" name="submitGo" class="btn btn-about fixed-bottom w-25 m-auto">Save</button>
                          </div>
              
              <?php
                 error_reporting(0); 
                 $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                 $test->EnemyData($_GET['e']);
              ?>

          </div> <!-- d-flex -->
        </div> <!-- row -->
      </div> <!-- container -->
      <p class="text-center f-7 position-absolute pt-5 mt-4 top-75 start-50 translate-middle"><small>Game exclusive for PC</small></p>
    </section><!-- End Testimonials Section -->
  </main><!-- End #main -->
  <?php
  require_once("includes/footer.php")
  ?>
  </div>
<!-- Possibility to add individual scripts -->
<script type="module" src="game.js"></script>
<script src="assets/js/game.js"></script>
</body>
</html>