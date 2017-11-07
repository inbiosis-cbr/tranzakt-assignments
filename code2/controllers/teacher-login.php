<?php

if (isset($_SESSION['AUTH_TEACHER'])) {
    echo <<<EOT
<script>
	window.location='./teacher-dashboard.php';
</script>
EOT;
    exit;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $teacher = db_login_teacher($pdo, $_POST['email'], $_POST['password']);
    if (isset($teacher['id'])) {
        $_SESSION['AUTH_TEACHER'] = $teacher;
        echo <<<EOT
<script>
	window.location='./teacher-dashboard.php';
</script>
EOT;
        exit;
    }
}
