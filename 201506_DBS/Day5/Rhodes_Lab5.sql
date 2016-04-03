-- NAME:  Kelly Rhodes
-- DATE:  June 16, 2015
-- ASSIGNMENT:  Lab 5

-- ************* QUESTION 1: *************
-- In our example database we have the orders, orderItem and item tables. 
-- These tables could be used by a shopping cart to save and track orders. 
-- Create new column on the item table called quantityInStock as a int. 
-- Populate the new field with the value 10 for all items. 
ALTER TABLE item
ADD quantityInStock int;

update item
set quantityInStock = 10;

-- ************* QUESTION 2: *************
-- Create a trigger on the orderItem table to update the field, ‘quantityInStock’  
-- from the item table whenever an insert occurs. 
-- IE: The ‘quantityInStock’ will decrement by the ordered quantity. 
delimiter $$

create trigger decreaseQty
after INSERT ON orderItem
for each row begin
update item
set quantityInStock = quantityInStock - new.quantity
where itemId = new.itemId;
end $$

delimiter ;

-- ************* QUESTION 3: *************
-- Select the item name and quantityInStock for itemId 13 & 28.
select itemName, quantityInStock
from item
where itemId in (13, 28); 

-- ************* QUESTION 4: *************
-- Place a new order for any user. Include item 13 & 28 in your order. 
-- You may choose the quantity. 
INSERT INTO orders (userId,orderDate,shippingDate, destinationState)
VALUES ('d5b572b2-e1de-11e2-b798-b827ebe08a9f', '2013-07-23', '2013-03-15 ', 'NM');

SELECT max(orderId) FROM orders;

INSERT INTO orderItem (orderId, itemId, quantity)
VALUES (21277, 13, 2);

INSERT INTO orderItem (orderId, itemId, quantity)
VALUES (21277, 28, 1);


-- ************* QUESTION 5: *************
-- To verify your trigger is working, select the item name and quantityInStock for itemId 13 & 28.
select itemName, quantityInStock
from item
where itemId in (13, 28); 

-- ************* QUESTION 6: *************
-- In addition to performing math & CRUD statements, ‘If than’ conditionals can also be coded into a trigger.  
-- Create a trigger on users called ’UserStatusChange’. 
-- If the field ‘userStatusId’ is updated, and the value is different from the value currently in the table, insert into the activityLog table.-- To reference existing fields in an “on update” trigger, use old.fieldname. 
-- Same as setting new value by “set new.created = now();”.-- If needed, Google “mysql trigger compare old new”.
delimiter $$

create trigger UserStatusChange
after UPDATE ON users
for each row begin
IF new.userStatusID != old.userStatusID 
	THEN insert into activityLog (activityDate, activityText, userId)
	values (now(),'User Created',new.userId);
END IF;
end $$

delimiter ;


-- ************* QUESTION 7: *************
-- In lecture we used a numbers table to select the count of orders placed, grouped by ages between 18 & 65.  
-- Use a number table to loop from 1 to 100 and return the count of DVD within that price range.
-- See word doc for example data & results
-- The counts above are correct. -- Hint: Use a scalar sub-query.
select n, 
	(select count(price)
	from dvd
	where price between n-1 and n
	) as dvdQty
from numbers
where numbers.n between 1 and 3;

-- ************* QUESTION 8: *************
-- Use a number table to loop from 0 to 16. 
-- Then include an inline view to find the number of vehicles  with the matching number of cylinders . 
-- You will be running this query twice. Once for vehicles built in 1990 and again for vehicles built in 2012. 
-- Use a case statement to replace null values with a 0.-- Hint: There were 9 vehicles with 0 cylinders built in 2012.
select n as cylinders, 
(select 
	case when count(*) is null then 0
		else count(*)
		end as cylinderCount
from vehicle
where cylinders = n
and year = 1990) as carQty
from numbers
where numbers.n >= 0
and numbers.n <=16;

select n as cylinders, 
(select 
	case when count(*) is null then 0
		else count(*)
		end as cylinderCount
from vehicle
where cylinders = n
and year = 2012) as carQty
from numbers
where numbers.n >= 0
and numbers.n <=16;


		

