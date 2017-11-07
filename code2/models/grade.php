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

function db_get_subject_grades($subject_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT subg.id as id, g.name as name, g.code as code  
FROM subject_grades AS subg
JOIN grades as g ON subg.grade_id = g.id 
WHERE subg.subject_id = :subject_id
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'subject_id' => $subject_id
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}
