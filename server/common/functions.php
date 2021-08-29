<?php

// 接続処理を行う関数
function connectDb()
{
    try {
        return new PDO(DSN, USER, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'システムエラーが発生しました';
        error_log($e->getMessage());
        exit;
    }
}

// エスケープ処理を行う関数
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function insertUser($email, $nick_name, $last_name,$first_name,$postal_code,$address,$telephon_number)
{
    
    $dbh = connectDb();

    $sql = <<<EOM
    INSERT INTO
        users
        (email, nick_name, last_name, first_name, postal_code, address, telephon_number)
    VALUES
        (:email, :nick_name, :last_name, :first_name, :postal_code, :address, :telephon_number);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':name', $nick_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':telephon_number', $telephon_number, PDO::PARAM_STR);

    $stmt->execute();
}

