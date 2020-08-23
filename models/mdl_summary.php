<?php

require_once "DatabaseHandler.php";

class mdl_summary extends DatabaseHandler
{
    public static function getUsers($month, $year)
    {
        self::connect();

        $query = 'SELECT users.*, ROUND(IFNULL(moneySpent, 0), 2) AS moneySpent
                FROM users
                LEFT JOIN (SELECT userId, SUM(buyAmount) - SUM(refundAmount) AS moneySpent
                    FROM (SELECT userId, amount AS buyAmount, 0 AS refundAmount
                        FROM transactions
                        WHERE MONTH(date) = ? AND YEAR(date) = ?
                        UNION ALL
                        SELECT refunds.receivingUserId AS userId, 0 AS buyAmount, amount AS refundAmount
                        FROM transactions, refunds
                        WHERE transactions.id = transactionId AND MONTH(date) = ? AND YEAR(date) = ?) AS TEMP
                    GROUP BY userId) AS A ON users.id = A.userId
                GROUP BY users.id
                ORDER BY firstname, lastname';

        $userTable = self::executeSqlStmt($query, "ssss", $month, $year, $month, $year);
        $usersArray = self::getTableAsArray($userTable);

        self::close();

        return $usersArray;
    }

    public static function getSummaryTotal($month, $year)
    {
        self::connect();

        $sql = "SELECT ROUND(IFNULL(SUM(amount), 0), 2) AS total 
                FROM transactions
                WHERE transactions.id NOT IN (SELECT transactionId FROM refunds) AND MONTH(date) = ? AND YEAR(date) = ?";
        $sumTable = self::executeSqlStmt($sql, "ss", $month, $year);
        $sumArray = self::getTableAsArray($sumTable);

        if (sizeof($sumArray) == 1) {
            $total = $sumArray[0]["total"];
        } else {
            echo "Too many sums were created. Exiting..";
            exit();
        }

        self::close();

        return $total;
    }
}