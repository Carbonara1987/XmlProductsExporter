<?php
/**
 * Created by PhpStorm.
 * User: Giovanni Mozambico
 * Date: 31/01/2020
 * Time: 11:45
 */

namespace ProductsExporter;

use PDO;
use PDOException;

class Database
{
    public static function connect() {


        $server = 'localhost';
        $user = 'admin';
        $pass = 'admin';
        $port='1433';
        $database = 'your-database';

        try {
            $conn = new PDO("mysql:host=$server;port=$port;dbname=$database", $user, $pass);


            return $conn;
        }
        catch(PDOException $e) {
            die("Error connecting to SQL Server: " . $e->getMessage());
        }
    }
}