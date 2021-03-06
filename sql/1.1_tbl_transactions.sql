CREATE TABLE `duofinances_dev`.`transactions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `amount` FLOAT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT NOW(),
  `proofSrc` NVARCHAR(MAX),
  PRIMARY KEY (`id`),
  FOREIGN KEY (userId) REFERENCES users(id));
