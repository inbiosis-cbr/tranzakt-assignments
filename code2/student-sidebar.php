<?php
    session_start();
?>
<div class="col-xs-12 col-md-4">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-info" disabled="disabled">
        Welcome, <?php echo isset($_SESSION['AUTH_STUDENT']['name']) ? $_SESSION['AUTH_STUDENT']['name'] : 'student'; ?>!
      </a>  
      <a href="./student-dashboard.php" class="list-group-item">Home</a>
      <a href="./student-logout.php" class="list-group-item">Logout</a>
    </div>
</div>