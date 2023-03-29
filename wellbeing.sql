CREATE DATABASE IF NOT EXISTS `wellbeing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wellbeing`;

CREATE TABLE `wellbeing_users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `reminiders` varchar(9000) NOT NULL,
  `userrole` int(11) NOT NULL COMMENT '0 for user\r\n1 for admin',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 for inactive\r\n1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `maze_users` (`ID`, `name`, `username`, `email`, `pass`, `DOB`, `userrole`, `status`) VALUES
(1, 'Admin', 'iqra', 'iqra.akthar@icloud.com', 'Iqra.103, '2005-07-07', 1, 1),
(2, 'Riad', 'Riad06', 'riad_ahmed@hotmail.com', 'Riad1619', '2002-29-10, 0, 1);

ALTER TABLE `wellbeing_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `reminder` (`reminder`);

ALTER TABLE `wellbeing_users`
  ADD CONSTRAINT `wellbeing_users_ibfk_1` FOREIGN KEY (`reminder`) REFERENCES `reminder` (`ID`);



