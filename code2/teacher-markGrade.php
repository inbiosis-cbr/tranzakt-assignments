<?php
  include('./header.php');
  include('./models/student.php');
  include('./models/subject.php');
  include('./models/teacher.php');
  include('./models/grade.php');

if (!isset($_REQUEST['id'])) {
    echo <<<EOT
<script>
  window.location='./teacher-students.php';
</script>
EOT;
    exit;
}

if (isset($_POST['mark'])) {
    db_assign_student_grade($_POST['mark']['student_subject_id'], $_POST['mark']['grade_id']);
    echo <<<EOT
<script>
  window.location='./teacher-students.php';
</script>
EOT;
    exit;
}

  $studentSubject = db_get_studentSubject($_REQUEST['id']);
  $subjectGrades = db_get_subject_grades($studentSubject['subject_id']);
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
                  <div class="panel-heading">Mark Grade for <?php echo $studentSubject['student_name']; ?>'s <?php echo $studentSubject['subject_name'] . " (" . $studentSubject['subject_code'] . ")"; ?></div>
                  <div class="panel-body">

                    <form method="POST" action="./teacher-markGrade.php">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                    <input type="hidden" name="mark[student_subject_id]" value="<?php echo $studentSubject['id']; ?>" />

                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group has-feedback">
                          <label>Grade:</label><br/ >
                          <select name="mark[grade_id]">
                            <option value="">Please choose an option</option>
                                <?php
                                foreach ($subjectGrades as $grade) {
                                    echo <<<EOT
<option value="{$grade['id']}">{$grade['name']} ({$grade['code']})</option>

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

                  </div>
                </div>

              </div>
            </div>

          </div>
      </div>

      <hr>

<?php
  include('./footer.php');
?>