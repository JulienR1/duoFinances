CREATE TABLE `duofinances_dev`.`refunds` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `transactionId` INT NOT NULL,
  `receivingUserId` INT NOT NULL,  
  PRIMARY KEY (`id`),
  FOREIGN KEY (receivingUserId) REFERENCES users(id),
  FOREIGN KEY (transactionId) REFERENCES transactions(id));
