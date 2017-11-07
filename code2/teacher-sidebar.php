<?php
    session_start();
?>
<div class="col-xs-12 col-md-4">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-info" disabled="disabled">
        Welcome, <?php echo isset($_SESSION['AUTH_TEACHER']['name']) ? $_SESSION['AUTH_TEACHER']['name'] : 'teacher'; ?>!
      </a>  
      <a href="./teacher-dashboard.php" class="list-group-item">Home</a>
      <a href="./teacher-students.php" class="list-group-item">Students</a>
      <a href="./teacher-subjects.php" class="list-group-item">Subjects</a>
      <a href="./teacher-grades.php" class="list-group-item">Grades</a>
      <a href="./teacher-logout.php" class="list-group-item">Logout</a>
    </div>
</div>