-- Lab Assignment, June 4 2015 (Day 2)

-- ***************************************************
-- Question 2:  Create a new user (as yourself or  favorite movie character) by inserting into the users table. 
-- As the userId is a varchar, choose a random, but unique value. 
-- Be sure to populate ALL columns. 
insert into users (userId, firstname, lastname, middleName, username, password, dob, gender, occupationId, userStatusId, userTypeId)
values('abc-123', 'Mickey', 'Mouse', 'Henry', 'mickeymouse', 'password', '1930-01-01', 'M', 41, 1, 1);

select * from users
where userId = 'abc-123';

-- ***************************************************
-- Question 3:  Create 2 new orders for the user created in question 2 by inserting into the orders and orderItem tables. 
-- Place at least 1 item per order. 
insert into orders (orderId, userId, orderDate, shippingDate)
values(21275, 'abc-123', '2015-01-01', '2015-01-02');

insert into orderItem(orderId, itemId, quantity)
values(21275, 24 , 2);

select * from orders
where orderId = 21275;

select * from orderItem
where orderId = 21275;

insert into orders (orderId, userId, orderDate, shippingDate)
values(21276, 'abc-123', '2015-02-01', '2015-02-02');

insert into orderItem(orderId, itemId, quantity)
values(21276, 16 , 3);

select * from orders
where orderId = 21276;

select * from orderItem
where orderId = 21276;

-- ***************************************************
-- Question 4:  Assign 2 DVDs to the user created in question 2
insert into userDVD(userId, dvdId)
values('abc-123',20);

insert into userDVD(userId, dvdId)
values('abc-123',10332);

select * from userDVD
where userId = 'abc-123';

-- ***************************************************
-- Question 5:  Assign 2 vehicles to the user created in question 2
insert into userVehicle(userId, vehicleId)
values('abc-123',1);

insert into userVehicle(userId, vehicleId)
values('abc-123',25);

select * from userVehicle
where userId = 'abc-123';

-- ***************************************************
-- Question 6:  Write a SQL statement to return the users (userId, firstname, lastname)
-- and their orders (orderId), only for users that have placed an order. 
-- Join the users and orders tables. 

select users.userId, firstname, lastname, orderId
from users 
join orders on users.userId = orders.userId;

-- ***************************************************
-- Question 7:  Write a SQL statement to return all users (limit 200) and orders if available. 
-- When joining the 2 tables, be sure to choose the correct type of join. 
select users.userId, firstname, lastname, orderId
from users 
left outer join orders on users.userId = orders.userId
limit 200;

-- ***************************************************
-- Question 8:  Write a SQL statement to return all users (userId, firstname, lastname) who have not placed an order. 
-- Again, when joining the users and order tables, choose the correct join. (limit 200) 
select users.userId, firstname, lastname
from users 
left outer join orders on users.userId = orders.userId
where orderId is null
limit 200;

-- ***************************************************
-- Question 9:  Write a SQL statement to return all orders (orderId, orderDate), 
-- the information of the user who placed the order (userId, firstName, Lastname), 
-- and their items ordered and quantities (itemName, quantity).  (limit 200)
select orders.orderId, orderDate, users.userId, firstname, lastname, itemName, quantity
from orders
join users on orders.userId = users.userId
join orderItem on orders.orderId = orderItem.orderId
join item on orderItem.itemId = item.itemId
limit 200;

-- ***************************************************
-- Question 10:  Alter the order table to add a column called “destinationState” 
-- and populate the existing orders with state abbreviations from the states table. 
-- You can manually or with an insert statement, populate the destinationState column with ANY valid state. 
ALTER TABLE orders
ADD destinationState char(2);

update orders 
set destinationState = 'FL';

-- ***************************************************
-- Question 11:  Create a foreign key between the tables, state and orders. 
-- IE: From table states, column state to table order table, column destinationState. 
-- FK always point at a FK.
ALTER TABLE orders
ADD FOREIGN KEY (destinationState)
REFERENCES state(state);

-- ***************************************************
-- Question 12:  Select  all users who have a lastname of “Steady”
-- and display their full name as a single field.  Paste SQL below and the time the query ran. (2pt)
select firstname, lastname,
concat (firstname, ' ', lastname) as fullname
from users
where lastname = 'Steady';


-- ***************************************************
-- Question 13:  Create an index on the last name column for the users table.  (A regular index, not unique) Paste SQL below.
CREATE INDEX lastname
ON users (lastname);

-- ***************************************************
-- Question 14:  Rerun the query from question 12.  Paste SQL below and the time the query ran. (1pt)
select firstname, lastname,
concat (firstname, ' ', lastname) as fullname
from users
where lastname = 'Steady';

-- ***************************************************
-- Question 15:  Get the count of all users with a last name ending in “ing”.  Paste SQL and results below.
select count(*) from users
where lastname like '%ing';

-- ***************************************************
-- Question 16:  Get the count of all users with a first name starting with “J” 
-- and who are employed.  Users who do not have an occupation are considered unemployed.  
-- Paste SQL and results below. 
select count(occupationId) from users
where firstname like 'J%';


