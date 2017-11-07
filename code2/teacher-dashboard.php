<?php
  include('./header.php');
  include('./models/teacher.php');
?>

    <div class="container"> <!-- close at footer.php -->

      <div class="row content-margin-top">
          <div class="col-xs-12 main-container">
            <!-- Content -->

            <div class="row">
                <?php
                include('./teacher-sidebar.php');
                ?>
              <div class="col-xs-12 col-md-8">
                You have login as teacher!
              </div>
            </div>

          </div>
      </div>

      <hr>

<?php
  include('./footer.php');
?>