DELIMITER $$

CREATE PROCEDURE CreateTransaction(
	IN userId INT,
    IN amount FLOAT,
    IN proofSrc VARCHAR(45)
)
BEGIN
	INSERT INTO `duofinances_dev`.`transactions`
	(`id`, `userId`, `amount`, `date`, `proofSrc`)
	VALUES (NULL, userId, amount, NOW(), proofSrc);
END$$

DELIMITER ;