<?php
  session_start();
  require_once("includes/auth_check.php");
  require_once("includes/header.php");
  require("class/FetchClass.php");
  ?>

<main id="main">

<!-- ======= Services Section ======= -->
<section id="score" class="score">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Score</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>
    <table class='table table-striped w-75 m-auto text-center mt-3'>
          <thead>
             <tr class='table-color'>
             <th scope='col'>Player</th>
             <th scope='col'>Enemy</th>
             <th scope='col'>Result</th>
             </tr>
          </thead>
          <tbody>
              <?php
                $test = new FetchClass($dbHost, $dbUser, $dbPassword, $database);
                $test->ScoreData() ;
              ?>
            </tbody>
          </table>
  </div>
</section><!-- End Score Section -->

</main><!-- End #main -->
<?php
require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
</body>
</html>