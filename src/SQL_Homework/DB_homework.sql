 
    CREATE DATABASE IF NOT EXISTS `insurance_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    USE `insurance_db`;
    CREATE TABLE Customers (
        ID INTEGER NOT NULL auto_increment,
        Name VARCHAR(20),
        Surname VARCHAR(20),
        City VARCHAR(20),
        Phone VARCHAR(10),
        Birthday DATE,
        UNIQUE (Phone),
        PRIMARY KEY (ID)
    );

    CREATE TABLE Policy (
    ID INTEGER NOT NULL auto_increment,
    Type VARCHAR(20),
    Price FLOAT NOT NULL,
    PRIMARY KEY (ID)
    );

    CREATE TABLE Managers (
    ID INTEGER NOT NULL auto_increment,
    Name VARCHAR(20),
    Surname VARCHAR(20),
    PRIMARY KEY (ID)
    );

    CREATE TABLE Deals (
    Police_Number INTEGER NOT NULL auto_increment,
    Customer_ID INTEGER NOT NULL,
    Manager_ID INTEGER NOT NULL,
    Policy_ID INTEGER NOT NULL,
    Date_Start DATE,
    Date_End DATE,
    PRIMARY KEY (Police_Number)
    );

    CREATE TABLE Payments (
    ID INTEGER NOT NULL auto_increment,
    Police_Number INTEGER NOT NULL,
    Payment INTEGER NOT NULL,
    Payment_Date DATE,
    PRIMARY KEY (ID)
    );

    ALTER TABLE Deals
    ADD CONSTRAINT `deals_customer_id` FOREIGN KEY (Customer_ID) REFERENCES Customers (ID);

    ALTER TABLE Deals
    ADD CONSTRAINT `deals_manager_id` FOREIGN KEY (Manager_ID) REFERENCES Managers (ID);

    ALTER TABLE Deals
    ADD CONSTRAINT `deals_policy_id` FOREIGN KEY (Policy_ID) REFERENCES Policy (ID);

    ALTER TABLE Payments
    ADD CONSTRAINT `policy_number` FOREIGN KEY (Police_Number) REFERENCES Deals (Policy_ID);

    INSERT INTO Customers (Name, Surname, City, Phone, Birthday) VALUES
    ('Mike', 'Brunt', 'London', '5243234344', '1984-03-15'),
    ('Michael', 'Smith', 'Rome', '0667423535', '1968-06-03'),
    ('Susan', 'Barker', 'Berlin', '0667453535', '1988-02-24'),
    ('John', 'Barker', 'Kyiv', '0996768811', '1977-05-04'),
    ('Frank', 'Tucker', 'Kyiv', '0996768999', '1993-09-22'),
    ('James', 'Hadley', 'London', '0996988866', '1972-04-22'),
    ('Charles', 'Frasier', 'Rome', '0936768822', '1788-12-23');

    INSERT INTO Policy (Type, Price) VALUES
    ('Life', '499.00'),
    ('Auto', '699.00'),
    ('Life plus Auto', '999.00');

    INSERT INTO Managers (Name, Surname) VALUES
    ('Steven', 'Spencer'),
    ('Margaret', 'Young'),
    ('Louis', 'Blake');

    INSERT INTO Deals (Customer_ID, Manager_ID, Policy_ID, Date_Start, Date_END) VALUES
    ('8', '2', '1', '2020-05-05', '2021-05-05'),
    ('9', '1', '2', '2020-02-02', '2021-02-05'),
    ('10', '3', '3', '2020-03-15', '2021-03-15'),
    ('11', '2', '1', '2020-06-01', '2021-06-01'),
    ('12', '3', '2', '2020-04-25', '2021-04-25'),
    ('13', '1', '3', '2020-11-22', '2021-11-22'),
    ('14', '3', '2', '2020-08-17', '2021-08-17');

    INSERT  INTO Payments(Police_Number, Payment, Payment_Date) VALUES
    ('1', '3454', '2021-02-02'),
    ('2', '8988', '2021-01-21'),
    ('3', '2000', '2020-12-02'),
    ('2', '900', '2020-12-12');



--     my queries
    SELECT Name, Surname, Phone
    FROM Customers
    WHERE City = 'Kyiv' AND Birthday > '1990-01-01';

    SELECT C.Name AS 'Customer ID', C.City AS 'Customer City', D.Date_Start, D.Date_End
    FROM Customers C
    JOIN Deals D
    ON C.ID = D.Customer_ID;

    SELECT  с.Name, d.Customer_ID, d.Date_Start
    FROM    Customers с
    RIGHT JOIN Deals d
    ON с.ID = d.Customer_ID
    GROUP BY с.name, d.Customer_ID, d.Date_Start
    HAVING COUNT(d.Policy_ID) > 1;

    SELECT DISTINCT d.Manager_ID, M.Name, M.Surname, P.Payment
    FROM Deals d
    JOIN Managers M on d.Manager_ID = M.ID
    JOIN Payments P on d.Police_Number = P.Police_Number
    ORDER BY P.Payment DESC;

    SELECT p.Payment, d.Date_Start, d.Date_End, m.Name, m.Surname
    FROM Payments p
    JOIN Deals d on p.Police_Number = d.Police_Number
    JOIN Managers m ON d.Manager_ID = m.ID
    WHERE p.Payment > 1000;

    SELECT MAX(p.Payment), p.Police_Number
    FROM Payments p
    JOIN Deals d ON p.Police_Number = d. Policy_ID
    GROUP BY Police_Number;















