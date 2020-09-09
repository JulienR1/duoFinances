DELIMITER $$

CREATE PROCEDURE CreateRefund(
	IN sendingUserId INT,
    IN receivingUserId INT,
    IN amount FLOAT,
    IN proofSrc VARCHAR(45),
    IN shortDesc TINYTEXT
)
BEGIN
	DECLARE nextTransactionId INT DEFAULT 0;
            
    CALL CreateTransaction(sendingUserId, amount, proofSrc, shortDesc);

	SELECT DISTINCT LAST_INSERT_ID() FROM transactions INTO nextTransactionId;

	INSERT INTO `duofinances_dev`.`refunds`
	(`id`, `transactionId`, `receivingUserId`)
	VALUES (NULL, nextTransactionId, receivingUserId);
    
END$$

DELIMITER ;