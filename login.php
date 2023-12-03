<?php
  session_start();
  require_once("includes/entic_check.php");
  require_once("includes/header.php");
  ?>


  <main id="main">

    <!-- ======= Login Section ======= -->
    <section id="login" class="login">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Login</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
          
            <div id="messageLg"></div> 
              <form action="" method="POST" id="myFormLg"  role="form" class="d-flex flex-column w-50 m-auto">
                  <div class="form-group">
                      <label for="usernameLg" class="form-label mt-3">Username</label>
                      <input type="text" name="usernameLg" class="form-control" id="usernameLg" placeholder="Username">
                  </div>


                  <div class="form-group">
                      <label for="passwordLg" class="form-label mt-3">Password</label>
                      <input type="password" name="passwordLg" class="form-control" id="passwordLg" placeholder="Password">
                  </div>

                  <hr>
                  <button type="submit" class="btn-about w-25 m-auto" id="submitBtnLg" name="submitBtnLg">Login</button>
                  <br>
                  <div><small>New here?</small></div>
                  <h5><a href="registration.php">Create an account</a></h5>
                </form>
          </div>
        </div>
      </div>
    </section><!-- End Login Section -->

  </main><!-- End #main -->
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
<script src="assets/js/codeLg.js"></script>
</body>
</html>