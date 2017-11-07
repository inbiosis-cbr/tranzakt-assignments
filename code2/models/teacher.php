<?php
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
