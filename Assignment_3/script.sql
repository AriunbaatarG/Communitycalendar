CREATE TABLE `contact_info` (
	`matriculation_number`  INT,
 	`email` VARCHAR(50),
 	`name` VARCHAR(50),
 	`phone_number` VARCHAR(50),
  PRIMARY KEY(`matriculation_number`)
);
CREATE TABLE `club_leader` (
 	`club_ID` INT,
  	`club_name` VARCHAR(50),
 	`matriculation_number` INT unique,
 	`email` VARCHAR(50),
  	`name` VARCHAR(50),
 	`phone_number` VARCHAR(50),
  	FOREIGN KEY (`matriculation_number`) REFERENCES contact_info(`matriculation_number`),
 	FOREIGN KEY (`email`) REFERENCES contact_info,
  	FOREIGN KEY (`name`) REFERENCES contact_info,
  	FOREIGN KEY (`phone_number`) REFERENCES contact_info,
  	PRIMARY KEY(`club_ID`,`matriculation_number`)
);
CREATE TABLE `student` (
  `email` varchar(100) NOT NULL,
    `mattriculation_number` int NOT NULL,
    `name` varchar(100) NOT NULL,
    `phone_number` int,
    FOREIGN KEY (`matriculation_number`, `email`, `name`, `phone_number`) REFERENCES contact_info;
);
CREATE TABLE `event` (
    `EVENT_ID` int NOT NULL,
    `EVENT_DATE` DATE NOT NULL,
    `EVENT_TIME` varchar(10) NOT NULL,
    `EVENT_LOCATION` varchar (100) NOT NULL,
    `email` varchar(100),
    `matriculation_number` int,
    `name` varchar(100),
    `phone_number` int,
    PRIMARY KEY (`EVENT_ID`, `EVENT_DATE`,`EVENT_TIME`,`EVENT_LOCATION`),
  	FOREIGN KEY (`matriculation_number`) REFERENCES contact_info
);
CREATE TABLE `FacilityOrganizer` (
    `Location` varchar(100),
    `Times` time,
    `EVENT_ID` int NOT NULL,
    `EVENT_DATE` DATE NOT NULL,
    `EVENT_TIME` varchar(10) NOT NULL,
    `EVENT_LOCATION` varchar (100) NOT NULL,
  	FOREIGN KEY (`EVENT_ID`, `EVENT_DATE`,`EVENT_TIME`,`EVENT_LOCATION`) REFERENCES event;
);