<?php

class DatabaseHandler
{
    private static $server = "localhost";
    private static $user = "root";
    private static $password = "Julien_SqlDEV";
    private static $database = "duofinances_dev";

    private static $conn = "";

    public static function connect()
    {
        self::$conn = new mysqli(self::$server, self::$user, self::$password, self::$database);
        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }
        return self::$conn;
    }

    public static function executeSql($sql)
    {
        return self::$conn->query($sql);
    }

    public static function executeSqlStmt($sql, $variableTypes, ...$vars)
    {
        $stmt = self::$conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param($variableTypes, ...$vars);
            $stmt->execute();
            $results = $stmt->get_result();
            $stmt->close();
            return $results;
        } else {
            echo "Failed to create statement";
            exit();
        }
    }

    public static function getTableAsArray($table)
    {
        $tableData = array();
        while (($rowData = $table->fetch_assoc())) {
            $tableData[] = $rowData;
        }
        return $tableData;
    }

    public static function close()
    {
        self::$conn->close();
    }
}