-- Notes from June 4, 2015

-- ****** COMPARISON OPERATORS **********
-- % needs to be used with like, % is a wild card character
-- All users with last name begins with 'C'
select * from users
where lastname like 'c%';
-- All users where last name ends in 'est'
select * from users
where lastname like '%est';
-- All users that contains string 'fet' 
-- (doesn't matter if at beginning, middle or end!)
select * from users
where lastname like '%fet%';

-- Or operator is in with comma seperated list in parens
select * from users
where lastname in ('smith', 'jones', 'silence');

-- Between, use with dates or numbers
select * from users
where dob >= '1990-01-01'
and dob <= '1990-12-31';

select * from users
where dob between '1990-01-01' and '1990-12-31'
and firstname like 'h%'
and userStatusId = 1;

select * from item
where itemPrice between 1 and 2;

-- ****** LIMIT **********
-- return the first 10 entries
select * from users
limit 10;

-- for MSSQL Server
select top 10 * from users;

-- ****** FUNCTIONS: COUNT **********
-- returns number of all rows of the table
select count(*) from users;

-- returns number of rows where that column has data
select count(occupationId) from users;

-- using NULL requires "is" or "is not"
select * from users where occupationId is null;

select * from users where occupationId is not null;

-- ****** FUNCTIONS: SORT **********
-- default is ascending, case acsending
-- use "asc" to specfy ascending and "desc" for descending
-- with limit, can specify what records to skip (4), and how many to show (3)
select * from users
order by lastname desc, firstname asc
limit 4, 3;

-- ****** FUNCTIONS: CONCAT **********
-- concat dynamically creates a new column
-- alias ("as") is renaming header of column
-- NEED A COMMA BEFORE CONCAT!
select firstname, lastname,concat (firstname, ' ', lastname) as fullnamefrom userslimit 100;

-- ****** INNER JOIN **********
-- only returns items with data that exists
-- for example, if there's no email for a user, they are not returned
select firstname, lastname, userEmail
from users
join userEmail on users.userId = userEmail.userId;

-- ****** OUTER JOIN **********
-- want everything from users table
-- and then...if they don't have an email, don't exclude them
-- left vs right outer join:  use the left table (don't exclude) when using "left", primary table
-- the word outer become option -- can delete
select firstname, lastname, userEmail
from users
left outer join userEmail on users.userId = userEmail.userId;

-- ****** CROSS JOIN **********
-- DO NOT DO!  WILL MATCH ALL RECORDS AND WILL TAKE FOREVER
-- not using the "on" statement
select user.userId, firstname, lastname, userEmail
from userEmail join users;

-- ****** NOT NULL **********
-- see structure.  It's a way to require a field.
-- Uncheck "Allow Null"

-- ****** USER STATUS / TYPE **********
-- see structure, set a default to "1" or active

-- ****** UNIQUE **********
-- see structure, indexes, field "non-unique"
-- if "0" is a unique field
-- userId, username 

-- ****** CHECK CONSTRAINT **********
-- limit the value that can be entered
-- i.e. age must be greater than 21
-- kinda buggy currently
-- would validate outside of SQL in your code

-- ****** INDEXES **********
-- see structures, index
-- use '+' at the bottom of index to create a new one
-- will speed up selection time greatly
-- will affect filters and joins
-- indexes are automatically created when you create a primary or foreign key
-- made an index from firstname column
select * from users where firstname = 'Frank';

