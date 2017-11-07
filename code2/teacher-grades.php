<?php
  include('./header.php');
  include('./models/grade.php');

  $grades = db_get_all_grades();
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

                <h2>All grades</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Grade Name</td>
                            <td>Code</td>
                            <td>Applied Subjects</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($grades as $grade) {
                            echo <<<EOT
                        <tr>
                          <td>{$grade['name']}</td>
                          <td>{$grade['code']}</td>
                          <td>0</td>
                          <td>  
                            <button type="button" class="btn btn-warning" alt="Edit" title="Edit">
                              <i class="fa fa-edit"></i>
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