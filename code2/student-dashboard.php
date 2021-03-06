<?php
  include('./header.php');
  include('./models/student.php');

  $student_grades = db_get_student_subjects($_SESSION['AUTH_STUDENT']['id']);
?>

    <div class="container"> <!-- close at footer.php -->

      <div class="row content-margin-top">
          <div class="col-xs-12 main-container">
            <!-- Content -->

            <div class="row">
                <?php
                include('./student-sidebar.php');
                ?>
              <div class="col-xs-12 col-md-8">
                You have login as student!

                <h2>Enrolled Subjects</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Subject</td>
                            <td>Enrolled Date</td>
                            <td>Grade</td>
                            <td>Teacher</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($student_grades as $data) {
                            $enroll_date = date('d M Y', strtotime($data['created_at']));

                            $grade_code = <<<EOT
<span class="label label-info">N/A</span>

EOT;
                            if (isset($data['grade_code'])) {
                                $grade_code = <<<EOT
<span class="label label-info">{$data['grade_code']}</span>

EOT;
                            }

                            $passingLabel = <<<EOT
<span class="label label-default">N/A</span>

EOT;
                            
                            if (isset($data['grade_is_passing'])) {
                                if ($data['grade_is_passing']) {
                                    $passingLabel = <<<EOT
<span class="label label-success">Passed</span>

EOT;
                                } else {
                                    $passingLabel = <<<EOT
<span class="label label-danger">Failed</span>

EOT;
                                }
                            }

                            $grade = db_get_student_grade($data['id']);
                            $graded_date = '-';
                            if (isset($data['graded_at'])) {
                                $graded_date = date('d M Y', strtotime($data['graded_at']));
                            }

                            $graded_teacher = '-';
                            if (isset($data['graded_teacher'])) {
                                $graded_teacher = $data['graded_teacher'];
                            }

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
                          <td>{$data['subject_name']}</td>
                          <td>{$enroll_date}</td>
                          <td>
                            {$gradeContent}
                          </td>
                          <td>{$graded_teacher}</td>
                          <td>  
                            -
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