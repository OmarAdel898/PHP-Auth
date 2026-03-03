<?php
class Database {
    private static $obj = null;
    private $conn;

    private function __construct() {
        $dbType = 'mysql';
        $host   = 'localhost';
        $dbName = 'iti';
        $user   = 'root';
        $pass   = '';

        try {
            $this->conn = new PDO("$dbType:host=$host;dbname=$dbName", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            session_start();
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$obj == null) {
            self::$obj = new Database();
        }
        return self::$obj;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
