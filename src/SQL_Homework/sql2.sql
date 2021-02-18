--     my queries
    SELECT Name, Surname, Phone
    FROM Customers
    WHERE City = "Kyiv" AND Birthday > "1990-01-01";

    SELECT C.Name AS ''Customer ID'', C.City AS ''Customer City'', D.Date_Start, D.Date_End
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












