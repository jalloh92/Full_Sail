-- Day 5 Lecture
-- June 16, 2015

-- Starting on Slide 8 (rest was review)
-- ********************* CASE **************************
-- The case statement allow if, then, else logic on a field in a select statement
select userId, gender, 
	case
	when gender = 'M' then 'Male'
	when gender = 'F' then 'Female'
	else 'NA'
	end as genderText
from users;

select dob,
	case
	when dob > '2003-01-01' then 'child'
	when dob > '1996-01-01' then 'teen'
	when dob > '1985-01-01' then 'twentysomething'
	when dob > '1970-01-01' then 'mid life'
	else 'older'
	end as ageCategory
from users;

-- Use case to replace null values with a  0.
select u.userId, firstname, lastname, 
	case
		when orderCount is null then 0
		else orderCount
	end as orderCount
from users as u
left join orderCount as oc
on  oc.userId = u.userId
limit 100;

-- ********************* TRIGGERS **************************
-- Your example database already has a trigger: 
-- When inserting into the users table you noticed the age and created date filled in automatically.
-- Triggers can be set to execute before or after an event such as an insert, update or delete.
insert into users (userId, username, password)
values ( '123', 'batman', '12345' );

-- Add a new column, age, to the users table and set the values based on the DOB:
alter table users add column age int;
update users set age = floor(dateDiff(now(),dob)/365);

-- Drop the current trigger on the users table:
drop trigger usersCreatedDateInsert;

-- Create a new trigger to set the created and age fields.
-- the delimiter is $$

-- ?? drop trigger userAgeInsert$$
delimiter $$
create trigger userAgeInsert
before insert on users
for each row begin
set new.created = now();
set new.age = floor(dateDiff(now(),new.dob)/365);
end $$

delimiter ;
insert into users (userId, username, password, DOB)
values ( '333', 'Woverine', '12345', '1880-01-01' );

delimiter $$
CREATE TRIGGER usersCreateActivity
AFTER INSERT ON users
FOR EACH ROW 
BEGIN
insert into activityLog (activityDate, activityText, userId)
values (now(),'User Created',new.userId);
END$$

delimiter ;
insert into users (userId, username, password, DOB)
values ( '444', 'Storm', '12345', '1980-01-01' );

-- ********************* NUMBERS TABLES **************************
-- Give what we have learned, here is the closest we could return:
SELECT 	age,  sum(itemPrice * quantity) as total
from 	users
join	 orders on orders.userId = users.userId
join 	orderItem on orderItem.orderId = orders.orderId
join	 item on item.itemId = orderItem.itemId
where age between 18 and 65
group by age
order by age;

update users set age = 21 where age = 22;
update users set age = 31 where age = 30;

select N as age, 
	case 
		when total is null then 0 else total
	end as total

from numbers
left join (
	SELECT 	age,  sum(itemPrice * quantity) as total
	from 	users
	join	 orders on orders.userId = users.userId
	join 	orderItem on orderItem.orderId = orders.orderId
	join	 item on item.itemId = orderItem.itemId
	where age between 18 and 65
	group by age
	order by age
) as saleData on saleData.age = numbers.n
where n between 18 and 65;




-- ********************* CREATE THE NUMBERS TABLES **************************
-- List of numbers from 1 - 100

CREATE TABLE `numbers` (
  `n` int(11) NOT NULL,
  PRIMARY KEY (`n`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `numbers` DISABLE KEYS */;
INSERT INTO `numbers` (`n`)
VALUES
	(1),
	(2),
	(3),
	(4),
	(5),
	(6),
	(7),
	(8),
	(9),
	(10),
	(11),
	(12),
	(13),
	(14),
	(15),
	(16),
	(17),
	(18),
	(19),
	(20),
	(21),
	(22),
	(23),
	(24),
	(25),
	(26),
	(27),
	(28),
	(29),
	(30),
	(31),
	(32),
	(33),
	(34),
	(35),
	(36),
	(37),
	(38),
	(39),
	(40),
	(41),
	(42),
	(43),
	(44),
	(45),
	(46),
	(47),
	(48),
	(49),
	(50),
	(51),
	(52),
	(53),
	(54),
	(55),
	(56),
	(57),
	(58),
	(59),
	(60),
	(61),
	(62),
	(63),
	(64),
	(65),
	(66),
	(67),
	(68),
	(69),
	(70),
	(71),
	(72),
	(73),
	(74),
	(75),
	(76),
	(77),
	(78),
	(79),
	(80),
	(81),
	(82),
	(83),
	(84),
	(85),
	(86),
	(87),
	(88),
	(89),
	(90),
	(91),
	(92),
	(93),
	(94),
	(95),
	(96),
	(97),
	(98),
	(99),
	(100);






