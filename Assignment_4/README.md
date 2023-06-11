
Execution time:1 ms
**Query #1**

    SELECT *
    FROM club_leader WHERE club_name LIKE 'Basketball_%';

| club_ID | club_name       | matriculation_number | name | email                     | phone_number |
| ------- | --------------- | -------------------- | ---- | ------------------------- | ------------ |
| 68      | Basketball Club | 44552                | thor | thor@jacobs-university.de | 03939        |
| 78      | Basketball Club | 445923052            | kyle | kyle@jacobs-university.de | 12323        |
| 88      | Basketball Club | 3334                 | brat | brat@jacobs-university.de | 083833939    |

---
Execution time:0 ms
**Query #2**

    SELECT EVENT_ID as Event , 
    email as organizer_email
    FROM FacilityOrganizer
    WHERE EVENT_ID = '01' or '03'
    group by EVENT_ID;

| Event | organizer_email             |
| ----- | --------------------------- |
| 1     | john@jacobs-university.de   |
| 2     | pam@jacobs-university.de    |
| 3     | jam@jacobs-university.de    |
| 4     | justin@jacobs-university.de |

---
Execution time:0 ms
**Query #3**

    Select * from student Order by matriculation_number desc ;

| matriculation_number | name     | email                         | phone_number |
| -------------------- | -------- | ----------------------------- | ------------ |
| 40009990             | cry      | cry@jacobs-university.de      | 0173646241   |
| 40006034             | malik    | malik@jacobs-university.de    | 0173151234   |
| 40005055             | ben      | ben@jacobs-university.de      | 0173434312   |
| 40005050             | jonathan | jonathan@jacobs-university.de | 0173491057   |

---
Execution time:1 ms
**Query #4**

    SELECT 
        m.matriculation_number, 
        m.name AS contact_info,
        c.matriculation_number, 
        c.name AS club_leader
    FROM
        club_leader c
    LEFT JOIN contact_info m ON c.matriculation_number=m.matriculation_number;

| matriculation_number | contact_info | matriculation_number | club_leader |
| -------------------- | ------------ | -------------------- | ----------- |
| 12345                | jack         | 12345                | jack        |
| 44552                | thor         | 44552                | thor        |
| 445923052            | kyle         | 445923052            | kyle        |
| 3334                 | brat         | 3334                 | brat        |

---
Execution time:0 ms
**Query #5**

    SELECT 
        a.EVENT_ID, 
        a.EVENT_LOCATION AS FacilityOrganizer,
        b.EVENT_ID, 
        b.EVENT_LOCATION AS event
    FROM
        event b
    LEFT JOIN FacilityOrganizer a ON b.EVENT_ID=a.EVENT_ID;

| EVENT_ID | FacilityOrganizer | EVENT_ID | event |
| -------- | ----------------- | -------- | ----- |
| 1        | IRC               | 1        | IRC   |
| 4        | SCC               | 4        | SCC   |

---
Execution time:0 ms
**Query #6**

    SELECT COUNT(matriculation_number) AS contact_info
    FROM contact_info;

| contact_info |
| ------------ |
| 10           |

---
