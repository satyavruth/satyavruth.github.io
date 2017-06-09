 
 use sql12177861;
 CREATE TABLE `user` (
 `user_id` INT AUTO_INCREMENT PRIMARY KEY,
 `Access Privelage` CHAR(1) NOT NULL DEFAULT 'B',
  `username` VARCHAR(32) UNIQUE,
  `password` VARCHAR(40)
);

INSERT INTO user VALUES(1,'A','root',SHA1('pass'));
