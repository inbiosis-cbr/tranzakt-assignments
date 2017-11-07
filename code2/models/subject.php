<?php

function db_get_all_subjects()
{
    global $pdo;

    $sql = <<<EOT
SELECT * FROM subjects 
ORDER BY name
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}
