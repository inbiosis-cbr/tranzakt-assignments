<?php

function db_get_all_grades()
{
    global $pdo;

    $sql = <<<EOT
SELECT * FROM grades
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}
