<?php
    session_start();
    unset($_SESSION['AUTH_STUDENT']);
    header('./index.php');

    echo <<<EOT
<script>
	window.location='./index.php';
</script>
EOT;
