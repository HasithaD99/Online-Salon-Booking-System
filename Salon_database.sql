


CREATE TABLE `book` (
  `Username` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BranchID` int NOT NULL,
  `BID` int NOT NULL,
  `DOV` date NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `book`
  ADD PRIMARY KEY (`Username`,`Fname`,`DOV`,`Timestamp`);


INSERT INTO `book` (`Username`, `Fname`, `Gender`, `BranchID`, `BID`, `DOV`, `Timestamp`, `Status`) VALUES
('UD47', 'Hasitha', 'male', 1, 1, '2022-08-08', '2022-07-10 16:43:48', 'Booking Registered.Wait for the update'),
('CB32', 'Chathuni', 'female', 2, 2, '2022-08-08', '2022-07-11 13:43:48', 'Booking Registered.Wait for the update'),
('KC40', 'Kasuni', 'female', 1, 1, '2022-08-09', '2022-07-25 11:00:48', 'Booking Registered.Wait for the update');


CREATE TABLE `branch` (
  `Branchid` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact` bigint NOT NULL,
  `mid` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branchid`,`name`);

INSERT INTO `branch` (`Branchid`, `name`, `address`, `town`, `city`, `contact`, `mid`) VALUES
(1, 'Branch1', 'Udugama Road, Nakiyadeniya', 'Nakiyadeniya', 'Galle', 9999988888, '2'),
(2, 'Branch2', 'Matara Road, Hakmana', 'Hakmana', 'Matara', 9955558888, '2'),
(3, 'Branch3', 'Rathmalana, Colombo', 'Rathmalana', 'Colombo', 9999666666, '1'),
(4, 'Branch5', 'Hambanthota Road, Suriyawewa', 'Suriyawewa', 'Hambanthota', 1111118888, '2'),
(5, 'Branch6', 'Kurunagala Road, Wariyapola', 'Wariyapola', 'Kurunagala', 9966668888, '1');


CREATE TABLE `Beautician` (
  `Bid` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `experience` int NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `contact` bigint NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `Beautician`
  ADD PRIMARY KEY (`Bid`);

INSERT INTO `Beautician` (`Bid`, `name`, `gender`, `dob`, `experience`, `specialization`, `contact`, `address`, `username`, `password`, `region`) VALUES
(1, 'Mahela', 'male', '1990-01-01', 8, 'Barbers', 1234567890, 'Udugama Road, Nakiyadeniya', 'Mahela', 'Mahela', 'South'),
(2, 'Hashini', 'female', '1995-01-01', 5, 'Hairdressers', 1237777890, 'Udugama Road, Thalgampala', 'Hashini', 'Hashini', 'South'),
(3, 'Fathima', 'female', '1998-07-11', 3, 'Cosmetologist', 1234333390, 'Galle Road, Wakwella', 'Fathima', 'Fathima', 'South'),
(4, 'Janadara', 'male', '1999-04-08', 5, 'Barbers', 1211117890, 'Mathara Road, Hakmana', 'Janadara', 'Janadara', 'South'),
(5, 'Tanya', 'female', '1995-02-09', 10, 'Hairdressers', 1288888890, 'Colombo Road, Rathmalana', 'Tanya', 'Tanya', 'Western'),
(6, 'Sashini', 'female', '1999-08-08', 5, 'Cosmetologist', 1211113390, 'Mathara Road, Ingiriya', 'Sashini', 'Sashini', 'Western'),
(7, 'Gagani', 'female', '1994-04-08', 5, 'Cosmetologist', 1555517890, ' Makadura, Hakmana', 'Gagani', 'Gagani', 'South'),
(8, 'Erandika', 'female', '1990-04-08', 12, 'Hairdressers', 1211199990, 'Colombo Road, Rathmalana', 'Erandika', 'Erandika', 'Western'),
(9, 'Saman', 'male', '1996-09-08', 5, 'Barbers', 1211117777, 'Kurunagala Road, Wariyapola', 'Saman', 'Saman', 'Western');



CREATE TABLE `Beautician_availability` (
  `Branchid` int NOT NULL,
  `Bid` int NOT NULL,
  `day` varchar(50) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `Beautician_availability`
  ADD PRIMARY KEY (`Branchid`,`Bid`,`day`,`starttime`,`endtime`);

INSERT INTO `Beautician_availability` (`Branchid`, `Bid`, `day`, `starttime`, `endtime`) VALUES
(1, 1, 'Friday', '10:00:00', '18:00:00'),
(1, 2, 'Monday', '10:00:00', '18:00:00'),
(1, 1, 'Thursday', '10:00:00', '18:00:00'),
(1, 2, 'Tuesday', '10:00:00', '18:00:00'),
(1, 1, 'Wednesday', '10:00:00', '18:00:00'),
(2, 3, 'Friday', '10:00:00', '18:00:00'),
(2, 4, 'Monday', '10:00:00', '18:00:00'),
(2, 3, 'Thursday', '10:00:00', '18:00:00'),
(2, 4, 'Tuesday', '10:00:00', '18:00:00'),
(2, 3, 'Wednesday', '10:00:00', '18:00:00'),
(3, 5, 'Friday', '10:00:00', '18:00:00'),
(3, 6, 'Monday', '10:00:00', '18:00:00'),
(3, 5, 'Thursday', '10:00:00', '18:00:00'),
(3, 6, 'Tuesday', '10:00:00', '18:00:00'),
(3, 7, 'Wednesday', '10:00:00', '18:00:00'),
(4, 8, 'Friday', '10:00:00', '18:00:00'),
(4, 7, 'Monday', '10:00:00', '18:00:00'),
(4, 8, 'Thursday', '10:00:00', '18:00:00'),
(4, 7, 'Tuesday', '10:00:00', '18:00:00'),
(4, 9, 'Wednesday', '10:00:00', '18:00:00');


CREATE TABLE `manager` (
  `mid` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`);

INSERT INTO `manager` (`mid`, `name`, `gender`, `dob`, `contact`, `address`, `username`, `password`, `region`) VALUES
(1, 'Samarasekare', 'male', '1992-01-01', 8800009999, 'Rathmalana,Colombo', 'Samarasekare', 'Samarasekare', 'Western'),
(2, 'Udayakumare', 'male', '1988-05-06', 8811111999, 'Nugawela,Galle', 'Udaya', 'Udaya', 'South');


CREATE TABLE `manager_branch` (
  `Branchid` int NOT NULL,
  `mid` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `manager_branch`
  ADD PRIMARY KEY (`Branchid`,`mid`);

INSERT INTO `manager_branch` (`Branchid`, `mid`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 2);


CREATE TABLE `Customer` (
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `Customer`
  ADD PRIMARY KEY (`email`,`username`);

INSERT INTO `Customer` (`name`, `gender`, `dob`, `contact`, `email`, `username`, `password`) VALUES
('user', 'male', '1999-01-01', 7897897897, 'user@test.com', 'user', 'user');
