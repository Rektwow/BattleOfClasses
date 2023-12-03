<?php
  session_start();
  require_once("includes/auth_check.php");
  require_once("includes/header.php");
  require("class/FetchClass.php");
  ?>

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Play</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row res-flex">
          
        <div class="col-6">
          <div>
          <h4 class="text-start">Player</h4>
            <select id="playertitle" class="w-select form-select w-50 me-auto mb-1">
            <?php
                $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                $test->PrepareBattle();
              ?>
            </select>
          </div>
          <div
            id="player"
            style="
              height: 318px;
              background-repeat: no-repeat;
              background-position: left top;
              background-size: auto 100%;
              background-image: url('assets/img/battle/deathknight.jpg');
            ">
        </div>
        </div>
        <div class="col-6">
          <div>
          <h4 class="text-end">Enemy</h4>
            <select id="enemytitle" class="w-select form-select w-50 ms-auto mb-1">
            <?php
                $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                $test->PrepareBattle();
              ?>
            </select>
          </div>
          <div
            id="enemy"
            style="
              height: 318px;
              background-repeat: no-repeat;
              background-position: right top;
              background-size: auto 100%;
              background-image: url('assets/img/battle/deathknight.jpg');
            ">
        </div>
        </div>
          </div>
                  <div class="d-flex justify-content-center align-items-center flex-column mt-3">
                  <h2 id="title">DeathKnight - DeathKnight</h2>
                  <button id="start" class="btn btn-about m-auto mt-3">Start Battle!</button>
                  </div>

        </div><!-- row -->
      </div><!-- container -->
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
<script src="assets/js/charSelect.js"></script>
</body>
</html>