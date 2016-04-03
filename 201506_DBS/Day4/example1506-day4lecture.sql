-- Day 4 Notes
-- June 11, 2015

-- ************* UNIONS
-- run 2 seperate queries
-- concatenate results from query 2 to query 1
-- need to select same number of columns in each query
-- the data doesn't need to be the same kind
-- last value of select statement was hard-coded to help identify the different queries
-- order by will mix up the results together
-- order by and limit applied to end result
-- UNION ALL:
select userId, firstname, lastname, 'users'
from users
union all
select userId, firstname, lastname, 'Archive'
from usersArchive
order by userId
limit 2000;

-- UNION:
-- removes duplicates from all rows...all data in row must be the same
select userId, firstname, lastname, 'users'
from users
union
select userId, firstname, lastname, 'Archive'
from usersArchive;

-- ************* SUB-QUERIES
-- SCALAR SUB-QUERIES:
-- creating dynamic column
-- only want to get one email for a user:
-- old way gets all emails:
select users.userId, firstname, lastname, userEmail
from users
join userEMail on users.userId = userEmail.userId;

-- new way to get one email per user:
-- the stuff in parens is like another select field
select userId, firstname, lastname,
(
	select userEmail 
	from userEmail
	where userId = users.userId
	limit 1
) as email
from users;

-- want count of how many orders they've placed
-- for a single user:
-- select count(*) from orders where userId = 'value';
-- for all users:
select userId, firstname, lastname,
(
	select count(*)
	from orders
	where userId = users.userId
) as orderCount,
(
	select count(*)
	from userEmail
	where userId = users.userId
)as emailCount,
(
	select userEmail 
	from userEmail
	where userId = users.userId
	limit 1
) as email
from users
having orderCount > 0
order by orderCount desc;

-- INLINE VIEW
-- creating a dynamic table
-- more efficient way to write:
select userId, count(*) as orderCount
from orders
group by userId;

-- slow to run!
select u.userId, firstname, lastname, orderCount
from users as u
 left join(
 	select userId, count(*) as orderCount
 	from orders group by userId
 ) as oc
 on oc.userId = u.userId;
 
-- ************* CORRELATED VS NON-CORRELATED
select userId, firstname, lastname,
( -- correlated:  inner & outer sub-queries are connected.  Does take an argument.  Dependent on userId
	select count(*) from orders
	where userId = users.userId
) as orderCount,
( -- non-correlated:  does not have any arguments; value doens't change.  Not dependent on anything.
	select avg(itemPrice)
	from item
) as avgItemPrice
from users;

-- ************* VIEWS
-- will permanently save as if you created a table
-- won't return anything directly
-- will be treated the same as if you created a table
-- can select from views
-- benefit is security, cleaner code
-- for the most part are read-only
create view orderCount as
 select userId, count(*) as orderCount
 from orders group by userId;





