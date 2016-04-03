-- Question 1:
-- Select the population (count) of users, grouped by state. 
-- Only use the ‘home’ address to determine the user’s home state. 
-- If a user has 2 home addresses, count both of them. 
select state, count(*)
from users
join userAddress on userAddress.userId = users.userId
where userAddressTypeId = 1
group by state;

-- Question 2:
-- Select the count of DVDs released grouped by year. 
-- Only show the last 10 years with the current year on top. 
select year, count(*)
from dvd
where year >= 2005
group by year desc;

-- Question 3:
-- Select the average publicRating for all DVDs by genre released in 2002. 
-- Exclude genres where the average is less then 2.2. (Use a HAVING clause)
select genre, avg(publicRating)
from dvd
where year = 2002
group by genre
having avg(publicRating) > 2.2;

-- Question 4:
-- Select the average age for all male, college/university professors. 
-- Use the datediff  function to compute age from DOB.  
select avg(datediff(now(),dob) / 365)
from users
where gender = 'M' AND
occupationId = 164;

-- Question 5:
-- Create a new table called DVDNormal with the columns dvdId, dvdTitle, year, publicRating, dvdStudioId, dvdStatusId and dvdGenreId. 
-- ‘Id’ fields should be integers. DVDId should not be auto assigned. 
-- Look at the structure of the DVD table for the other field types.
CREATE TABLE DVDNormal(
	dvdId int(11) NOT NULL,
	dvdTitle varchar(255),
	year varchar(255),
	publicRating decimal(4,2),
	dvdStudioId int(11),
	dvdStatusId int(11),
	dvdGenreId int(11),
	PRIMARY KEY (dvdId)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Question 6:
-- Create the supporting tables for dvdNormal table including dvdStudio, dvdStatus, & dvdGenre. 
-- Each table should have 2 columns. The ‘id’ fields should be integers and auto increment. 
CREATE TABLE dvdStudio(
	dvdStudioId int(11) NOT NULL UNIQUE AUTO_INCREMENT,
	studio varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE dvdStatus(
	dvdStatusId int(11) NOT NULL UNIQUE AUTO_INCREMENT,
	dvdStatus varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE dvdGenre(
	dvdGenreId int(11) NOT NULL UNIQUE AUTO_INCREMENT,
	genre varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Question 7:
-- Create 3 foreign keys between the DVDNormal table and the 3 supporting tables. 
-- Turn cascading on for updates and deleted. 
ALTER TABLE dvdNormal
ADD FOREIGN KEY (dvdStudioId)
REFERENCES dvdStudio(dvdStudioId)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE dvdNormal
ADD FOREIGN KEY (dvdStatusId)
REFERENCES dvdStatus(dvdStatusId)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE dvdNormal
ADD FOREIGN KEY (dvdGenreId)
REFERENCES dvdGenre(dvdGenreId)
ON UPDATE CASCADE
ON DELETE CASCADE;

-- Question 8:
-- Create unique indexes on the 3 new tables for the name columns. 
CREATE UNIQUE INDEX studio
ON dvdStudio (studio);

CREATE UNIQUE INDEX dvdStatus
ON dvdStatus (dvdStatus);

CREATE UNIQUE INDEX genre
ON dvdGenre (genre);

-- Question 9:
-- Create indexes on the DVD table for the studio, status and genre columns. 
CREATE INDEX studio
ON dvd (studio);

CREATE INDEX status
ON dvd (status);

CREATE INDEX genre
ON dvd (genre);

-- Question 10:
-- Insert into the 3 new tables (dvdStudio, dvdStatus, & dvdGenre) by selecting the unique values from the DVD table. 
insert into dvdStudio(studio)(
	select distinct(studio)
	from dvd
);

insert into dvdStatus(dvdstatus)(
	select distinct(status)
	from dvd
);

insert into dvdgenre(genre)(
	select distinct(genre)
	from dvd
);

-- Question 11:
-- Insert into the dvdNormal table by joining the dvd, dvdStudio, dvdStatus, and dvdGenre tables 
-- (AS DVD is a large table, this may run for several mins.)
insert into dvdNormal(dvdId, dvdTitle, year, publicRating, dvdStudioId, dvdStatusId, dvdGenreId)(
	select dvdId, DVD_Title, year, publicRating, dvdStudioId, dvdStatusId, dvdGenreId
	from dvd
	join dvdStudio on dvdStudio.studio = dvd.studio
	join dvdStatus on dvdStatus.dvdStatus = dvd.status
	join dvdGenre on dvdGenre.genre = dvd.genre
);

-- Question 12:
-- Create a view to include the following fields: dvdId, dvd_title, dvdStudio, dvdStatus, dvdGenre. 
-- Do not use the dvd table in the select. 
-- Use the dvdNormal, dvdStudio, dvdStatus, & dvdGenre tables.
CREATE VIEW dvdView
AS select
   dvdNormal.dvdId AS dvdId,
   dvdNormal.dvdTitle AS dvd_title,
   dvdStudio.studio AS dvdStudio,
   dvdStatus.dvdStatus AS dvdStatus,
   dvdGenre.genre AS dvdGenre
from dvdNormal
join dvdStudio on dvdStudio.dvdStudioId = dvdNormal.dvdStudioId
join dvdStatus on dvdStatus.dvdStatusId = dvdNormal.dvdStatusId
join dvdGenre on dvdGenre.dvdGenreId = dvdNormal.dvdGenreId;

-- Question 13:
-- The userDVD table connects users with the DVDs they own.  
-- Select the count of DVDs owned by each user. 
-- (Use count & group by.)
select userId, count(*)
from userDVD
group by userId;

-- Question 14:
-- Select the userId, firstname, lastname, DVDCount and gender of the female with the most DVDs. 
-- Use the answer from the previous question as an inline view.
select userId, firstname, lastname, gender,
	(select count(*) from userDVD as udvd
	where udvd.userId = u.userId) as DVDcount	
from users as u
where gender='F'
group by DVDcount desc
limit 1;

