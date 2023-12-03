<?php
  session_start();
  require_once("includes/entic_check.php");
  require_once("includes/header.php");
  ?>


  <main id="main">

    <!-- ======= Registration Section ======= -->
    <section id="registration" class="registration">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Registration</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
          <div id="message"></div> 
              <form action="" method="POST" id="myForm" data-toggle="validator" role="form" class="d-flex flex-column w-50 m-auto">

                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label help-block with-errors">Faction</label>
                      <select name="faction" class="form-control" id="faction" data-error="Choose a faction" required>
                          <option value="">Select</option>
                          <option value="horde">Horde</option>
                          <option value="alliance">Alliance</option>
                      </select>
                      <div id="errorFaction"></div> 
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <label for="exampleFormControlInput1" class="form-label mt-3 help-block with-errors">Full Name</label>
                          <div class="col-sm-6">
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" data-error="Enter your full name" required>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" data-error="Enter your full name" required>
                          </div>
                          <div id="errorName"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="form-label mt-3 help-block with-errors">Username</label>
                      <input type="text" name="username" data-minlength="3" class="form-control" id="username" placeholder="Username" data-error="Username must have at least 3 characters" required>
                      <div id="errorUser"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label mt-3 help-block with-errors">Email Address</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="email@email.com" data-error="Enter a valid email address" required>
                      <!-- onkeyup="verifyMail()" --> 
                      <div id="errorEmail"></div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <label for="exampleFormControlInput1" class="form-label mt-3 help-block with-errors">Password</label>
                          <div class="col-sm-6">
                            <input type="password" name="password" data-minlength="8" class="form-control" id="password" placeholder="Password" data-error="Minimum of 8 characters" required>
                            <div id="errorPassword"></div>
                          </div>
                          <div class="col-sm-6">
                            <input type="password" name="password_confirm" class="form-control" id="passwordConfirm"  data-match="#password" data-error="Minimum of 8 characters" data-match-error="Whoops, these don't match" placeholder="Confirm password" required>
                          </div> 
                      </div>
                    </div>

                    <hr>
                    <button onclick="setDisabledBtn()" type="submit" class="btn btn-about w-50 m-auto" id="submitBtn" name="submitBtn">Sign Up</button>
                    <br>
                    <div><small>Already have an account?</small></div>
                    <h5><a href="login.php">Sign in here</a></h5>
                    </form>
          </div>
        </div>
      </div>
    </section><!-- End Registration Section -->

  </main><!-- End #main -->
  <script>
   function addDisabledBtn(){
      document.getElementById("submitBtn").setAttribute("disabled", "");
   }
   function setDisabledBtn(){
      setTimeout(addDisabledBtn, 200);
   }
</script>
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
<script src="assets/js/code.js"></script>
<script src="assets/js/validator.js"></script>
</body>
</html>