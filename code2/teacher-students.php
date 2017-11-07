<?php
  include('./header.php');
  include('./models/teacher.php');

  $students = db_get_all_students();
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

                <h2>All students</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Subject</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($students as $student) {
                            echo <<<EOT
                        <tr>
                          <td>{$student['name']}</td>
                          <td>{$student['email']}</td>
                          <td> - </td>
                          <td>  
                            <button type="button" class="btn btn-warning" alt="Enroll Subject" title="Enroll Subject" onClick="window.location='./teacher-enroll.php?id={$student['id']}';">
                              <i class="fa fa-magic"></i>
                            </button>
                          </td>
                        </tr>
EOT;
                        }
                        ?>
                    </tbody>
                </table>

              </div>
            </div>

          </div>
      </div>

      <hr>

<?php
  include('./footer.php');
?>