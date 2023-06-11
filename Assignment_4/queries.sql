
-- create
CREATE TABLE contact_info (
	matriculation_number INT,
    name VARCHAR(50),
 	email VARCHAR(50),
 	phone_number VARCHAR(50),
  PRIMARY KEY(matriculation_number)
);

CREATE TABLE club_leader (
  club_ID INT,
  club_name VARCHAR(50),
  matriculation_number INT REFERENCES contact_info(matriculation_number),
  name VARCHAR(50) REFERENCES contact_info(name),
  email VARCHAR(50) REFERENCES contact_info(email),
  phone_number VARCHAR(50) REFERENCES contact_info(phone_number),
  PRIMARY KEY(club_ID)
);

CREATE TABLE student (
  matriculation_number INT REFERENCES contact_info(matriculation_number),
  name VARCHAR(50) REFERENCES contact_info(name),
  email VARCHAR(50) REFERENCES contact_info(email),
  phone_number VARCHAR(50) REFERENCES contact_info(phone_number),
  PRIMARY KEY (matriculation_number) 
);

CREATE TABLE FacilityOrganizer (
    Times time,
    EVENT_ID int NOT NULL REFERENCES event(EVENT_ID),
    EVENT_DATE DATE NOT NULL,
    EVENT_LOCATION varchar (100) NOT NULL,
    matriculation_number INT REFERENCES contact_info(matriculation_number),
    name VARCHAR(50) REFERENCES contact_info(name),
    email VARCHAR(50) REFERENCES contact_info(email),
    phone_number VARCHAR(50) REFERENCES contact_info(phone_number),
  	PRIMARY KEY (EVENT_ID)
);
CREATE TABLE event (
    EVENT_ID INT NOT NULL,
    EVENT_DATE DATE NOT NULL REFERENCES FacilityOrganizer(EVENT_DATE),
    EVENT_TIME varchar(100) REFERENCES FacilityOrganizer(EVENT_TIME),
    EVENT_LOCATION varchar(100) NOT NULL REFERENCES FacilityOrganizer(EVENT_LOCATION),
    PRIMARY KEY (EVENT_ID)
);

-- insert
INSERT INTO contact_info VALUES('1234','Nurmukhammad','nabdurasul@jacobs-university.de','252562');
INSERT INTO contact_info VALUES('5354','Sam','sam@jacobs-university.de','252636');
INSERT INTO contact_info VALUES('12345','jack','jack@jacobs-university.de','252562');
INSERT INTO club_leader VALUES('24','Football Club','12345','jack','jack@jacobs-university.de','252562');
INSERT INTO FacilityOrganizer VALUES('21:00:00','01','2022-11-27','IRC','1234','john','john@jacobs-university.de','252562');
INSERT INTO event VALUES('01','2022-11-27','21:00:00','IRC');
INSERT INTO contact_info VALUES('224','BILL','JAMSS@jacobs-university.de','3432');
INSERT INTO contact_info VALUES('884','KORG','korg@jacobs-university.de','2222');
INSERT INTO contact_info VALUES('44552','thor','thor@jacobs-university.de','03939');
INSERT INTO club_leader VALUES('68','Basketball Club','44552','thor','thor@jacobs-university.de','03939');
INSERT INTO FacilityOrganizer VALUES('22:00:00','03','2022-11-14','SCC','444','jam','jam@jacobs-university.de','252562');
INSERT INTO event VALUES('04','2022-01-13','14:00:00','SCC');
INSERT INTO contact_info VALUES('3334','brat','brat@jacobs-university.de','083833939');
INSERT INTO club_leader VALUES('88','Basketball Club','3334','brat','brat@jacobs-university.de','083833939');
INSERT INTO contact_info VALUES('445923052','kyle','kyle@jacobs-university.de','12323');
INSERT INTO club_leader VALUES('78','Basketball Club','445923052','kyle','kyle@jacobs-university.de','12323');
INSERT INTO contact_info VALUES('44334','pam','pam@jacobs-university.de','3434315');
INSERT INTO FacilityOrganizer VALUES('22:00:00','02','2022-11-14','SCC','44334','pam','pam@jacobs-university.de','3434315');
INSERT INTO contact_info VALUES('34322','justin','justin@jacobs-university.de','9393');
INSERT INTO FacilityOrganizer VALUES('22:00:00','04','2022-11-14','SCC','34322','justin','justin@jacobs-university.de','9393');

INSERT INTO student VALUES('40005050','jonathan', 'jonathan@jacobs-university.de', '0173491057');
INSERT INTO student VALUES('40005055','ben', 'ben@jacobs-university.de', '0173434312');
INSERT INTO student VALUES('40006034','malik', 'malik@jacobs-university.de', '0173151234');
INSERT INTO student VALUES('40009990','cry', 'cry@jacobs-university.de', '0173646241');



-- fetch 
SELECT *
FROM club_leader WHERE club_name LIKE 'Basketball_%';

SELECT EVENT_ID as Event , 
email as organizer_email
FROM FacilityOrganizer
WHERE EVENT_ID = '01' or '03'
group by EVENT_ID;

Select * from student Order by matriculation_number desc ;
SELECT 
    m.matriculation_number, 
    m.name AS contact_info,
    c.matriculation_number, 
    c.name AS club_leader
FROM
    club_leader c
LEFT JOIN contact_info m ON c.matriculation_number=m.matriculation_number;

SELECT 
    a.EVENT_ID, 
    a.EVENT_LOCATION AS FacilityOrganizer,
    b.EVENT_ID, 
    b.EVENT_LOCATION AS event
FROM
    event b
LEFT JOIN FacilityOrganizer a ON b.EVENT_ID=a.EVENT_ID;

SELECT COUNT(matriculation_number) AS contact_info
FROM contact_info;
