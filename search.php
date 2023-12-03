<?php
  session_start();
  require_once("includes/header.php")
  ?>

  <main id="main">

    <!-- ======= Search Section ======= -->
    <section id="search" class="search">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Search</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search for Classes, Specializations or Roles" />
            </div>
            <div class="table-responsive" id="dynamic_content"></div>
        </div>
      </div>

      
      </div>
    </section><!-- End Search Section -->

  </main><!-- End #main -->
<?php
  require_once("includes/footer.php")
?>
<!-- Possibility to add individual scripts -->
<script src="assets/js/search.js"></script>
</body>
</html>