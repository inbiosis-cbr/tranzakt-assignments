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

                <h2>Enroll subject for <?php echo $student['name']; ?></h2>

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

              </div>
            </div>

          </div>
      </div>

      <hr>

<?php
  include('./footer.php');
?>