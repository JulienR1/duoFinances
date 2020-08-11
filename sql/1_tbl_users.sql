CREATE TABLE `duofinances_dev`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` NVARCHAR(45) NOT NULL,
  `lastname` NVARCHAR(45) NOT NULL,
  `entryDate` DATE NOT NULL,
  `imgSrc` NVARCHAR(128),
  PRIMARY KEY (`id`));
