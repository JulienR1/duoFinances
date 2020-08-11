<?php

require_once "DatabaseHandler.php";

class mdl_summary extends DatabaseHandler
{
    public static function getUsers($month, $year)
    {
        self::connect();

//TODO: remove union, change for join

        $query = 'SELECT users.*, SUM(buyAmount) - SUM(refundAmount) AS moneySpent
FROM users, (SELECT userId, amount AS buyAmount, 0 AS refundAmount
		FROM transactions
		WHERE month(date) = ? AND year(date) = ?

		UNION

		SELECT refunds.receivingUserId AS userId, 0 AS buyAmount, amount AS refundAmount
		FROM transactions, refunds
		WHERE transactions.id = transactionId AND month(date) = ? AND year(date) = ?) AS A
WHERE A.userId = users.id
GROUP BY userId
ORDER BY firstname, lastname';

        $userTable = self::executeSqlStmt($query, "ssss", $month, $year, $month, $year);
        $usersArray = self::getTableAsArray($userTable);

        self::close();

        return $usersArray;
    }

    public static function getUserTransactions($month, $year)
    {

    }

    public static function getSummaryTotal($month, $year)
    {
        self::connect();

        $sql = "SELECT SUM(amount) AS total FROM transactions WHERE transactions.id NOT IN (SELECT transactionId FROM refunds) AND MONTH(date) = ? AND YEAR(date) = ?";
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