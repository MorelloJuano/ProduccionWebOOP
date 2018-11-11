<?php
require_once("user.class.php");
require_once("logs.class.php");
require_once("logsColl.class.php");

class DBA{
    private static $dbHost = '127.0.0.1';
    private static $dbName   = 'produccionweb';
    private static $dbUser = 'root';
    private static $dbPass = '';
    private static $dbCharset = 'utf8mb4';
    private static $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    private $connection;

    public function __construct(){
        $host = self::$dbHost;
        $db = self::$dbName;
        $charset = self::$dbCharset;
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        try {
            $this->connection = new PDO($dsn, self::$dbUser, self::$dbPass, self::$options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getLoginData($username){
        $query = "SELECT username, hash, salt FROM users where username = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$username]);
        $rawUserData = $stmt->fetch();
        return new User($rawUserData['username'], $rawUserData['hash'], $rawUserData['salt']);
    }

    public function getUserLogs(User $user){
        $query = "SELECT dateLog, typeLog FROM logs WHERE idUser = (SELECT idUser FROM users WHERE username = ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$user->username]);
        $arrayLogs = new logsColl();
        while ($row = $stmt->fetch()){
            $arrayLogs->addNewLog(new Logs($row['dateLog'], $row['typeLog']));
        }
        return $arrayLogs;
    }

    public function insertUserLogs(User $user, $action){
        $query = "INSERT INTO logs (dateLog, typeLog, idUser) VALUES (DATE(), $action, (SELECT idUser FROM users WHERE username = ?))";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$user->username]);
    }
}