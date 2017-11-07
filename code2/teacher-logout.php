<?php
    session_start();
    unset($_SESSION['AUTH_TEACHER']);
    header('./index.php');

    echo <<<EOT
<script>
	window.location='./index.php';
</script>
EOT;
