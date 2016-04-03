-- Day 6 - Functions and Stored Procedures

delete from dvd where genre = 'silent';


-- Using "IN" with a sub-queryselect * from dvd 
where DVD_Title = '7th Voyage Of Sinbad'
or 	DVD_title = 'Animaniacs, Vol. 1'
or 	DVD_Title = 'ParaNorman';

select * from dvd 
where DVD_Title in ('7th Voyage Of Sinbad','Animaniacs, Vol. 1','ParaNorman');


-- Using "IN" with a sub-query

select * from dvd where genre = 'Silent';

delete from dvd where genre = 'Silent';

delete from userDVD where dvdId in (select dvdId from dvd where genre = 'Silent');delete from dvd where genre = 'Silent';


-- Function: getSum
delimiter $$

drop function if exists getSum $$
CREATE FUNCTION getSum(a DECIMAL(12,4), b DECIMAL(12,4), c DECIMAL(12,4)) RETURNS DECIMAL(12,4)BEGIN    RETURN a + b + c;END$$

-- Test getSum
delimiter ;

select getSum(1.123, 2.412, 3.6121) as sum;


-- Scalar Function 
SELECT userId, 	(SELECT count(*) FROM userEmail ue	WHERE ue.userId = u.userId)	AS emailCountFROM users ulimit 100;-- Replacing a scalar sub-query with a function
delimiter $$drop function if exists getUserEmailCount $$CREATE FUNCTION getUserEmailCount(fId varchar(50)) 
RETURNS int
READS SQL DATA
BEGIN
	declare r int;
	SELECT count(*) into r FROM userEmail WHERE userId = fId;
	return(r);
END$$

-- Test getUserEmailCount
delimiter ; 
SELECT userId, 	getUserEmailCount(userId) AS emailCountFROM users limit 100;-- Procedure: procTest1
DELIMITER $$  CREATE PROCEDURE procTest1 (IN var1 INT, OUT var2 INT, OUT var3 INT)  BEGIN    set var2 = var1 + 2; 	set var3 = var1 * 2;  END $$DELIMITER ;call procTest1(4,@result1,@result2);select @result1, @result2;-- Procedure: getFullName
delimiter $$DROP PROCEDURE IF EXISTS getFullName $$create procedure getFullName(in uId varchar(50), out fullname varchar(500))begin 	select 	concat(firstname, ' ', lastname) into fullname 	from 		users 	where 	userId = uId;end $$-- Test getFullNameDELIMITER ;
call getFullName('00bcf640-e245-11e2-89f5-c42c03098f6c',@fullname);select @fullname;
-- Procedure: createUser
delimiter $$

DROP PROCEDURE IF EXISTS createUser $$

create procedure createUser(in firstname varchar(100), in lastname varchar(100), in middlename varchar(100), in uname varchar(20), in pwd varchar(20), in gender varchar(1), in birth varchar(20), in cellphone varchar(50), in primaryEmail varchar(50), in address varchar(500),	in city varchar(100), in state varchar(20), in zip varchar(20), out uId varchar(50) )
begin 
	
	declare newUserId VARCHAR(50);
	set newUserId = uuid();
	set uId = newUserId;

	start transaction;

	insert into users (userId, firstname, lastname, middlename, username, password, gender, dob) values (
		uId,
		firstname,
		lastname,
		middlename,
		uname,
		pwd,
		gender,
		birth
	);

	insert into userEmail (userId, userEmail, userEmailTypeId) values(
		uId,
		primaryEmail,
		1
	);

	insert into userPhone (userId, userPhone, userPhoneTypeId) values(
		uId,
		cellphone,
		1
	);
	
	insert into userAddress (userId, userAddressTypeId, address, city, state, zip) values(
		uId,
		1,
		address,
		city,
		state,
		zip
	);
	
	commit;
end $$

-- Test createUser
DELIMITER ;

call createUser('Bane','Bloodlust','Crazy','bcb','password','M','1990-05-05','321-555-1212','bane@bloodlust.com','123 Main Street','Orlando','FL','32806',@uId);
select @uId;
select * from users where userId = @uId;




-- Removing a user without violating FKs
delete from userEmail where userId = @uId;
delete from userPhone where userId = @uId;
delete from userAddress where userId = @uId;
delete from activityLog where userId = @uId;
delete from users where userId = @uId;



