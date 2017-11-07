<?php
include('database.php');

function db_login_teacher($pdo, $email, $password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = <<<EOT
SELECT * FROM teachers WHERE email=:email
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
                $update_sql = "UPDATE teachers SET password = :password WHERE id = :id";
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

function db_get_all_students()
{
    global $pdo;

    $sql = <<<EOT
SELECT * FROM students 
ORDER BY name
EOT;

    $stmt = $pdo->prepare($sql);
    $params = [
    ];
    $stmt->execute($params);

    return $stmt->fetchAll();
}

function db_assign_student_grade($student_subject_id = 0, $grade_id = 0)
{
    global $pdo;

    $sql = <<<EOT
SELECT * FROM student_grades 
WHERE student_subject_id = :student_subject_id
EOT;
    $stmt = $pdo->prepare($sql);
    $params = [
        'student_subject_id' => $student_subject_id,
    ];
    $stmt->execute($params);
    $exists = $stmt->fetchAll();

    if (count($exists) > 0) {
        $sql = <<<EOT
UPDATE student_grades SET grade_id = :grade_id, graded_by = :graded_by, updated_at = NOW() 
WHERE student_subject_id = :student_subject_id
EOT;
    } else {
        $sql = <<<EOT
INSERT INTO student_grades (student_subject_id, grade_id, graded_by, created_at, updated_at) 
VALUES (:student_subject_id, :grade_id, :graded_by, NOW(), NOW())
EOT;
    }

    $stmt = $pdo->prepare($sql);
    $params = [
        'student_subject_id' => $student_subject_id,
        'grade_id' => $grade_id,
        'graded_by' => (isset($_SESSION['AUTH_TEACHER']['id'])) ? $_SESSION['AUTH_TEACHER']['id'] : 0
    ];
    $stmt->execute($params);

    return true;
}
