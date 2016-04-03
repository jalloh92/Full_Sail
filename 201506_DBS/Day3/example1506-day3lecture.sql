-- Notes from Day 3 (June 9 2015)

-- ******** EXPLAIN *****************
-- "explain" describes the path the query is using
-- is a tuning tool, shows how the SQL is running
explain
select userId, firstname, lastname
from users
where middlename = 'Luna';

-- we can't predict which table is grabbed first, we don't know the algorithm
explain
select users.userId, firstname, lastname, userEmail
from users
join userEmail on users.userId = userEmail.userId;

-- ******** FUNCTIONS *****************
-- SCALAR FUNCTIONS -- return one entry per row
-- more like formatting

-- ucase: returns all upper case 
-- (as changes name of column)
select firstname,
ucase(firstname) as upper
from users;

-- lcase: returns all lower case 
-- (as changes name of column)
select firstname,
lcase(firstname) as lower
from users;

-- mid:  string function that arguments are string, starting character, length of string
select firstname,
mid(middlename, 1, 1) as midInitial
from users;

-- concat:  concatenates strings together
select
concat(firstname, ' ', lastname) as fullname
from users;

-- can nest functions:
select ucase(concat(firstname, ' ', lastname)) as fullUName
from users;

-- left:  return first character on the left (arguments are string and string length)
-- there's also a right
select
left(firstname, 1)
from users;

-- NUMERICS:
-- round, ceiling and floor
-- round (2nd argument is how far it will be rounded)
-- floor and ceiling do not take additional arguments
select itemPrice,
round(itemPrice,2) as r
from item;

-- look at structure for dollar amounts
-- 10,2 means 10 digits in length, 2 after decimal point

-- You can do math!
select quantity, itemPrice,
(quantity * itemPrice) as total,
round((quantity * itemPrice * 0.06),2) as tax
from item
join orderItem on item.itemId = orderItem.itemId;

-- Date Functions:
-- now is just the current date and time
select now();

-- see slides for more date stuff & formatting
select orderDate,
date_format(orderDate,'%b %d %Y %h:%i %p')
from orders;

-- Month, Day, Year Format
select date_format(orderDate,'%m-%d-%Y') 
from orders;

-- Date Diff (number of days between two dates)
Select datediff(now(),orderDate),
orderDate,
datediff(now(),orderDate)/30 as months,
datediff(now(),orderDate)/365 as years
from orders;

-- ********** AGGREGATE FUNCTIONS ***********
-- count is aggregate, we get one row back
select count(*) from orders;

-- distinct returns unique (non-repeating) values
select distinct(itemCategory) from item
order by itemCategory;

-- average, sum, max, min
select avg(itemPrice),
sum(itemPrice),
max(itemPrice),
min(itemPrice),
sum(itemPrice) / count(*) as manualAvg
from item;

-- want average price for each category
-- anything in the group by, should also have in the select (so that it maps up)
select itemCategory,
avg(itemPrice), count(*)
from item
group by itemCategory;

-- only want average for electronics & autos:
select itemCategory,
avg(itemPrice), count(*)
from item
where itemCategory = 'electronics'
or itemCategory = 'auto'
group by itemCategory;

-- OR....
select itemCategory,
avg(itemPrice), count(*)
from item
where itemCategory in ('electronics', 'auto')
group by itemCategory;

-- ********** ORDER OF OPERATIONS ***********
select users.userId, firstname, lastname,
count(*) as orderCount
from users
join orders on users.userId = orders.userId
group by lastname, firstname;
-- (don't need to specify users.userId on group by b/c the select already specified it)

-- ********** HAVING ***********
-- HAVING is only used on DYNAMICALlY created columns, run last
select users.userId, count(*) as emailCount
from users
join userEmail on users.userId = userEmail.userId
where gender = 'F'
group by userId
having emailCount > 1;

select concat(firstname, ' ', lastname) as fullname
from users
having fullname = 'Axel Rister';

-- ********** SELECT INTO ***********
-- Clear out tables
delete from listing;
delete from genre;
delete from station;

-- Populate genre table
-- Use distinct to popluate the unique values
-- take results and push into column named genre
-- GET SELECT RUNNING, THEN DO INSERT!
-- Don't run multiple times (you'll popluate the table twice)
insert into genre(genreName) (
	select distinct(genre) from cableRawData
);

-- Populate station table
insert into station(stationName) (
	select distinct(station) from cableRawData
);

-- start over at 1 for ID
-- ALTER TABLE station AUTO_INCREMENT = 1;

-- Populate listing table
-- Joining on a string and not an integer value! (very few instances, usually only during normalization)
insert into listing(listingName, stationId, genreId, premierdate) (
select show1, stationId, genreId, premierDate
from cableRawData as c
join station on c.station = station.stationName
join genre on c.genre = genre.genreName
);

select * from listing 
join station on listing.stationId = station.stationId
join genre on genre.genreId = listing.genreId;

-- can then delete the cableRawData table because we have normalized into 3 tables

-- Table to archive users
CREATE TABLE `usersArchive` (
`userid` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `occupationId` int(11) DEFAULT NULL,
  `userStatusId` int(11) DEFAULT NULL,
  `userTypeId` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into usersArchive
(select * from users where created < '2013-07-01');

-- converting data from a string to a decimal
-- after conversion, delete the original columns
update vehicle set mpgH = round(MPGHighway,2);
update vehicle set mpgC = round(MPGCity,2);















