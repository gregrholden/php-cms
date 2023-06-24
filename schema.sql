-- Tables to create in MySQL/MariaDB.

CREATE TABLE IF NOT EXISTS `users` (
  `uid` INT AUTO_INCREMENT NOT NULL,
  `username` VARCHAR(255) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  PRIMARY KEY(uid)
);

CREATE TABLE IF NOT EXISTS `content` (
  `cid` INT AUTO_INCREMENT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `body` TEXT,
  `uid` INT NOT NULL,
  `created` TIMESTAMP NOT NULL,
  `updated` TIMESTAMP NOT NULL,
  PRIMARY KEY (`cid`),
  FOREIGN KEY (`uid`) REFERENCES `users`(`uid`)
);
