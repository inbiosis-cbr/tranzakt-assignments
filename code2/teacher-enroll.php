<?php
  include('./header.php');
  include('./models/student.php');
  include('./models/subject.php');

if (!isset($_REQUEST['id'])) {
    echo <<<EOT
<script>
  window.location='./teacher-students.php';
</script>
EOT;
    exit;
}

if (isset($_POST['subject'])) {
    db_assign_student_subject($_POST['subject']['student_id'], $_POST['subject']['subject_id']);
    echo <<<EOT
<script>
  window.location='./teacher-students.php';
</script>
EOT;
    exit;
}

  $subjects = db_get_all_subjects();
  $student = db_get_student($_REQUEST['id']);
  $studentSubjects = db_get_studentSubjects($_REQUEST['id']);
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

                <div class="panel panel-default">
                  <div class="panel-heading">Enroll New Subject for <?php echo $student['name']; ?></div>
                  <div class="panel-body">

                    <?php
                    if (count($studentSubjects) < 2) {
                    ?>

                    <form method="POST" action="./teacher-enroll.php">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                    <input type="hidden" name="subject[student_id]" value="<?php echo $student['id']; ?>" />

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group has-feedback">
                          <label>Subject:</label><br/ >
                          <select name="subject[subject_id]">
                            <option value="">Please choose an option</option>
                                <?php
                                foreach ($subjects as $subject) {
                                    echo <<<EOT
<option value="{$subject['id']}">{$subject['name']} ({$subject['code']})</option>

EOT;
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    <?php } else { ?>

                    <div class="alert alert-warning">Maximum 2 subjects enrolled reached!</div>

                    <?php } ?>

                  </div>
                </div>

                <h2>Enrolled Subjects</h2>

                <table class="table table-hover">
                  <thead>
                      <tr>
                        <th>Subject</th>
                        <th>Enrolled Date</th>
                        <th>Grade</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($studentSubjects as $subject) {
                        $enroll_date = date('d M Y', strtotime($subject['enrolled_at']));
                        $grade = db_get_student_grade($subject['student_subject_id']);

                        $gradeContent = <<<EOT
<span class="label label-default">N/A</span>

EOT;
                        if (isset($grade['code'])) {
                            if ($grade['is_passing']) {
                                $passingLabel = <<<EOT
<span class="label label-success">Passed</span>
EOT;
                            } else {
                                $passingLabel = <<<EOT
<span class="label label-danger">Failed</span>
EOT;
                            }
                            $gradeContent = <<<EOT
<span class="label label-default">{$grade['code']}</span> / {$passingLabel}

EOT;
                        }

                        echo <<<EOT
                    <tr>
                      <td>{$subject['name']} ({$subject['code']})</td>
                      <td>{$enroll_date}</td>
                      <td>{$gradeContent}</td>
                      <td>
                        <button type="button" class="btn btn-warning" alt="Mark Grade" title="Mark Grade" onClick="window.location='teacher-markGrade.php?id={$subject['student_subject_id']}';">
                          <i class="fa fa-star-o"></i>
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