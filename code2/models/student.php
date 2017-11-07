<?php
include('database.php');

function db_login_student($pdo, $email, $password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = <<<EOT
SELECT * FROM students WHERE email=:email
EOT;
    $stmt = $pdo->prepare($sql);
    $params = [
        'email' => $email,
    ];
    $stmt->execute($params);
    $results = $stmt->fetchAll();
    foreach ($results as $result) {
        //echo $password . " " . $result['password'];
        if (password_verify($password, $result['password'])) {
            //echo 'verified';
            if (password_needs_rehash($result['password'], PASSWORD_BCRYPT) === true) {
                $newHash = password_hash($password, PASSWORD_BCRYPT);
                $update_sql = "UPDATE students SET password = :password WHERE id = :id";
                $pdo->prepare($update_sql)->execute([
                    'password' => $newHash,
                    'id' => $result['id']
                ]);
            }
            return $result;
        }
    }
    return [];
}

function db_get_student_subjects($student_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT ss.*, g.name as grade_name, g.code as grade_code, subg.is_passing as grade_is_passing, subg.created_at as graded_at, t.name as graded_teacher, s.name as subject_name, s.code as subject_code 
FROM student_subjects AS ss 
JOIN subjects as s ON ss.subject_id = s.id 
LEFT JOIN student_grades as stug ON ss.id = stug.student_subject_id 
LEFT JOIN subject_grades as subg ON subg.subject_id = ss.subject_id AND subg.grade_id = stug.grade_id  
LEFT JOIN grades as g ON subg.grade_id = g.id 
LEFT JOIN teachers as t ON stug.graded_by = t.id 
WHERE ss.student_id = :student_id
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_id' => $student_id,
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}

function db_get_student($student_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT id, name, email FROM students 
WHERE id = :student_id
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_id' => $student_id,
    ];
    $stmt->execute($params);

    return $stmt->fetch();
}

function db_assign_student_subject($student_id = 0, $subject_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT * FROM student_subjects 
WHERE student_id = :student_id AND subject_id = :subject_id
EOT;

    $stmt = $pdo->prepare($sql)->execute([
        'student_id' => $student_id,
        'subject_id' => $subject_id
    ]);
    $exists = $stmt->fetchAll();

    if (count($exists) > 0) {
        //Do nothing.
    } else {
        $sql = <<<EOT
INSERT INTO student_subjects (student_id, subject_id, created_at, updated_at) 
VALUES (:student_id, :subject_id, NOW(), NOW()) 
EOT;
        $pdo->prepare($sql)->execute([
            'student_id' => $student_id,
            'subject_id' => $subject_id
        ]);
    }
    
    return true;
}

function db_get_studentSubjects($student_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT *, ss.id as student_subject_id, ss.created_at as enrolled_at 
FROM student_subjects AS ss
JOIN subjects AS s ON s.id = ss.subject_id 
WHERE ss.student_id = :student_id
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_id' => $student_id,
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}

function db_get_studentSubject($student_subject_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT ss.*, stu.name AS student_name, s.name AS subject_name, s.code as subject_code 
FROM student_subjects AS ss 
JOIN students AS stu ON ss.student_id = stu.id 
JOIN subjects AS s ON ss.subject_id = s.id 
WHERE ss.id = :student_subject_id
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_subject_id' => $student_subject_id,
    ];
    $stmt->execute($params);

    return $stmt->fetch();
}

function db_get_student_grade($student_subject_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT stug.*, g.code as code, g.name as name, subg.is_passing as is_passing FROM student_grades AS stug
JOIN subject_grades as subg ON stug.grade_id = subg.id 
JOIN grades AS g ON subg.grade_id = g.id 
WHERE student_subject_id = :student_subject_id 
ORDER BY id DESC;
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_subject_id' => $student_subject_id,
    ];
    $stmt->execute($params);

    return $stmt->fetch();
}
