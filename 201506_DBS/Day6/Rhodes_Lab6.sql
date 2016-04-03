-- NAME:  Kelly Rhodes
-- DATE:  June 18, 2015
-- ASSIGNMENT:  Lab 6

-- ************* QUESTION 1: *************
-- Select the average mpg city and the average fuel cost annually, grouped by fuel type. 
-- Return the rows with the best mpg city first. 
select fuelType, avg(mpgCity), avg(fuelCostAnnual)
from vehicle
group by fuelType 
order by avg(mpgCity) desc;

-- ************* QUESTION 2: *************
-- Delete the vehicles (Yes, actually delete the rows!) with only 3 cylinders. 
-- Remember, to comply with your foreign key constraints, you must delete from user vehicle first. 
delete from userVehicle where vehicleId in 
(select vehicleId from vehicle where cylinders = 3);

delete from vehicle where cylinders = 3;

-- ************* QUESTION 3: *************
-- Create a function that accepts an item Id as input and returns the number of items in stock.
delimiter $$

CREATE FUNCTION numItemsInStock(fId INT(11)) 
RETURNS INT
READS SQL DATA
BEGIN
	declare r int;
	SELECT quantityInStock into r FROM item WHERE itemId = fId;
	return(r);
END$$

delimiter ;

select itemId, numItemsInStock(itemId) as qty
from item;

-- ************* QUESTION 4: *************
-- Create a function that accepts an order Id as input and returns the sum total price of all items on that order multiplied by the quantity ordered.  
delimiter $$

CREATE FUNCTION totalPrice(oId INT(11)) 
RETURNS DECIMAL(10,2)
READS SQL DATA
BEGIN
	declare r DECIMAL(10,2);
	SELECT SUM(quantity * itemPrice) 
	into r FROM orderItem 
	join item on item.itemId = orderItem.itemId
	WHERE orderId = oId;
	return(r);
END$$

delimiter ;

SELECT orderId, totalPrice(orderId) AS totalPrice
FROM orderItem limit 10;


-- ****** test logic **********	
-- This gives me the subtotal (qty * itemPrice) for each itemId in each order
SELECT orderId, orderItem.itemId, quantity, itemPrice, (quantity * itemPrice) as subtotal
from orderItem
join item on item.itemId = orderItem.itemId
order by orderId;	

-- This gives me the total for each order (sum up qty * itemPrice for each item)
SELECT orderId, SUM(quantity * itemPrice) as total
from orderItem
join item on item.itemId = orderItem.itemId
group by orderId
order by orderId;	

-- ************* QUESTION 5: *************
-- Create a stored procedure that accepts a user Id and returns the user’s full name, 
-- occupation, the count to all orders they placed, the number of DVDs they own, and the number of vehicles they own. 
delimiter $$

DROP PROCEDURE IF EXISTS wholeEnchilada$$

delimiter $$
CREATE PROCEDURE wholeEnchilada(IN uID varchar(50), OUT fullname varchar(500), OUT occupation varchar(250), OUT orderCount INT(11), OUT numDVDs INT(11), OUT numVehicles INT(11))
BEGIN 

	-- Full Name
	SELECT concat(firstname, ' ', lastname) INTO fullname
	FROM users 
	WHERE userId = uID;
	
	-- Occupation
	SELECT occupation INTO occupation
	FROM occupation
	join users on occupation.occupationId = users.occupationId
	WHERE users.userId = uID;
	
	-- Order Count
	SELECT orderCount INTO orderCount
	FROM ordercount
	WHERE ordercount.userId = uID; 
	
	-- Number of DVDs
	SELECT count(*) INTO numDVDs
	FROM userDVD
	WHERE userDVD.userID = uID;
	
	-- Number of Vehicles
	SELECT count(*) INTO numVehicles
	FROM userVehicle
	WHERE userVehicle.userId = uID;
		
END $$

DELIMITER ;

call wholeEnchilada('1e657659-e1fe-11e2-b47a-c42c03098f6c',@fullname, @occupation, @orderCount, @numDVDs, @numVehicles);
select @fullname, @occupation, @orderCount, @numDVDs, @numVehicles;


-- ****** test logic **********	
-- FULL NAME:
-- returns Scarlett Bolado
SELECT concat(firstname, ' ', lastname)
	FROM users 
	WHERE userId = '00bcf640-e245-11e2-89f5-c42c03098f6c';

-- OCCUPATION:
-- returns Probation Officerselect occupation 
	from occupation
	join users on occupation.occupationId = users.occupationId
	where users.userid = '00bcf640-e245-11e2-89f5-c42c03098f6c';	

-- ORDER COUNT:
-- returns NULL
SELECT orderCount
	FROM ordercount
	WHERE ordercount.userId = '00bcf640-e245-11e2-89f5-c42c03098f6c';

-- NUMBER OF DVDS
-- returns 0SELECT count(*) 
	FROM userDVD
	WHERE userDVD.userID = '00bcf640-e245-11e2-89f5-c42c03098f6c';

-- NUMBER OF VEHICLES
-- returns 0
SELECT count(*)
	FROM userVehicle
	WHERE userVehicle.userId = '00bcf640-e245-11e2-89f5-c42c03098f6c';
	
-- John's working code:	
	
delimiter $$
DROP PROCEDURE IF EXISTS getProfile$$

delimiter $$
create procedure getProfile(in uId varchar(50), out fullname varchar(500),out orders int(11),out dvds int(11),out vehicles int(11)) 
begin 
select concat(firstname, ' ', lastname) into fullname 
from users 
where userId = uId;
select count(*)orderId into orders
from orders
where userId = uId;
select count(*)dvdId into dvds
from userDVD
where userId = uId;
select count(*)vehicleId into vehicles
from uservehicle
where userId = uId;
end $$

DELIMITER ;
call getProfile('1e657659-e1fe-11e2-b47a-c42c03098f6c',@fullname,@orders,@dvds,@vehicles);
select @fullname,@orders,@dvds,@vehicles; 
