<?php

require_once "DatabaseHandler.php";

class mdl_transactionList extends DatabaseHandler
{
    public static function getMonthlyTransactionDetails($month, $year)
    {
        self::connect();

        $query = "SELECT *
                FROM
                (SELECT date, firstname, lastname, imgSrc, receivingFirstname, receivingLastname, receivingImgSrc, amount, proofSrc
                FROM (SELECT A.id, date, firstname, lastname, imgSrc, amount, proofSrc
                    FROM users
                    JOIN (SELECT transactions.id, date, userId, amount, proofSrc
                        FROM transactions
                        LEFT JOIN refunds ON refunds.transactionId = transactions.id) AS A
                    ON users.id = userId) AS X

                LEFT JOIN

                (SELECT A.id, firstname AS receivingFirstname, lastname AS receivingLastname, imgSrc AS receivingImgSrc
                FROM users
                JOIN (SELECT transactions.id, receivingUserId
                    FROM transactions
                    LEFT JOIN refunds ON refunds.transactionId = transactions.id) AS A
                ON users.id = receivingUserId) AS Y

                ON X.id = Y.id) AS P
                WHERE MONTH(date) = ? AND YEAR(date) = ?
                ORDER BY date DESC";

        $transactionTable = self::executeSqlStmt($query, "ss", $month, $year);
        $transactions = self::getTableAsArray($transactionTable);

        self::close();

        return $transactions;
    }
}