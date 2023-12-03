<?php
  session_start();
require("class/FetchClass.php");
require_once("includes/header.php");
  ?>

  <main id="main">

    <!-- ======= Classes Section ======= -->
    <section id="classes" class="classes">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Classes</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row">
          <div class="d-flex flex-wrap justify-content-center">
              <?php
                $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                $test->DisplayClasses();
              ?>
          </div> <!-- flex -->
        </div> <!-- row -->
      </div> <!-- container -->
    </section><!-- End Classes Section -->

  </main><!-- End #main -->
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
</body>
</html>