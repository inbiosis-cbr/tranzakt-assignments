<?php
session_start();

if (isset($_SESSION['AUTH_STUDENT'])) {
    echo <<<EOT
<script>
	window.location='./student-dashboard.php';
</script>
EOT;
    exit;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $student = db_login_student($pdo, $_POST['email'], $_POST['password']);
    if (isset($student['id'])) {
        $_SESSION['AUTH_STUDENT'] = $student;
        echo <<<EOT
<script>
	window.location='./student-dashboard.php';
</script>
EOT;
        exit;
    }
}
