<?php
  include('./header.php');
  include('./models/subject.php');

  $subjects = db_get_all_subjects();
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

                <h2>All subjects</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Subject Name</td>
                            <td>Code</td>
                            <td>Total Students</td>
                            <td>Teachers</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($subjects as $subject) {
                            echo <<<EOT
                        <tr>
                          <td>{$subject['name']}</td>
                          <td>{$subject['code']}</td>
                          <td>0</td>
                          <td>0</td>
                          <td>  
                            <button type="button" class="btn btn-warning" alt="Edit" title="Edit">
                              <i class="fa fa-edit"></i>
                            </button>

                            <button type="button" class="btn btn-warning" alt="Grades" title="Grades">
                              <i class="fa fa-trophy"></i>
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