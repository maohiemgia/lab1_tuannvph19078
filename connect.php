<?php

$host = 'localhost';
$dbname = 'ph19078_examphp1';
$user = 'root';
$password = '';

function connection()
{
    global $host, $dbname, $user, $password;
    try {
        $connect = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $password);
        // echo "ket noi thanh cong";
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
    } catch (PDOException $e) {
        echo "Query to DB bug:<br>" . $e->getMessage();
        throw $e;
    }
}


function querySQL($sql, $fetchdata = 0, $fetchid = -1, $fetchAll = 0)
//fetchdata 
{
    $connect = connection();
    $stmt = $connect->prepare($sql);

    try {
        if ($fetchdata == 0) {
            return $stmt->execute();
        }
        if ($fetchdata == 1) {
            if ($fetchid > -1) {
                if ($fetchAll == 1) {
                    $stmt->execute([$fetchid]);
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $stmt->execute([$fetchid]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // fetch về mảng 1 chiều
        if ($fetchdata == 2) {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $err) {
        echo "Query to DB bug:<br>" . $err->getMessage();
    } finally {
        unset($stmt, $connect);
    }
}
