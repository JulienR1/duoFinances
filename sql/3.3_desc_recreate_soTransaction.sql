DELIMITER $$

CREATE PROCEDURE CreateTransaction(
	IN userId INT,
    IN amount FLOAT,
    IN proofSrc VARCHAR(45),
    IN shortDesc TINYTEXT
)
BEGIN
	INSERT INTO `duofinances_dev`.`transactions`
	(`id`, `userId`, `amount`, `date`, `proofSrc`, `shortDesc`)
	VALUES (NULL, userId, amount, NOW(), proofSrc, shortDesc);
END$$

DELIMITER ;

