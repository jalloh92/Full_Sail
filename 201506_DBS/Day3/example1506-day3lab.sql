-- Day 3 Lab Assignment

-- ************* Question 1: *************
-- Retrieve the average MPG Highway for all vehicles.
select avg(mpgHighway)
from vehicle;

-- ************* Question 2: *************
-- Retrieve the top 10 (best) average MPG City values by vehicle model. 
-- Group the average MPG values by vehicle model. 
-- Exclude vehicles with a MPG city value of 0 as these are electric cars. 
-- Example: The average MPG city of all Ford Mustangs across all years would be 1 of the rows returned. 
select model,
avg(mpgCity) 
from vehicle
group by model
having avg(mpgCity) > 0
order by avg(mpgCity) DESC
limit 10;

-- ************* Question 3: *************
-- Retrieve the count of models produced by each make in 1997. 
-- Order the results by make. 
select make, count(*) as modelCount
from vehicle
where year = 1997
group by make;

-- ************* Question 4: *************
-- Retrieve the count of models produced by each make in only 2002. 
-- Order the results by make. 
-- Exclude makes who only produce less than 5 models by using a having clause.
select make, count(*) as modelCount
from vehicle
where year = 2002
group by make
having modelCount > 5;


-- ****** NORMALIZE VECHICLE DATA ********
-- ************* Question 5: *************
-- The columns with repeating  data will be moved to separate tables. 
-- Create tables for the following columns: make, model, drive, fuelType. 
-- Name the tables vehicleMake, vehicleModel, vehicleDrive and vehicleFuelType. 
-- Set the id fields of these table auto increment. Table type should be INNOdb.
CREATE TABLE `vehicleMake`(
`makeId` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
`make` varchar(255) NULL
 )ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 CREATE TABLE `vehicleModel`(
`modelId` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
`model` varchar(255) NULL
 )ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 CREATE TABLE `vehicleDrive`(
`driveId` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
`drive` varchar(255) NULL
 )ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 CREATE TABLE `vehicleFuelType`(
`fuelTypeId` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
`fuelType` varchar(255) NULL
 )ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ************* Question 6: *************
-- Create unique indexes on the name columns for the 4 tables we just created.
CREATE UNIQUE INDEX make
ON vehicleMake (make);

CREATE UNIQUE INDEX model
ON vehicleModel (model);

CREATE UNIQUE INDEX drive
ON vehicleDrive (drive);

CREATE UNIQUE INDEX fuelType
ON vehicleFuelType (fuelType);

-- ************* Question 7: *************
-- Populate the 4 new tables with the appropriate data using the select into statement with the distinct function.
insert into vehicleMake(make) (
	select distinct(make) from vehicle
);

insert into vehicleModel(model) (
	select distinct(model) from vehicle
);

insert into vehicleDrive(drive) (
	select distinct(drive) from vehicle
);

insert into vehicleFuelType(fuelType) (
	select distinct(fuelType) from vehicle
);

-- ************* Question 8: *************
-- Create a new table called vehicleNormal. 
-- Include the following columns: vehicleId, makeId, modelId, Year, cylinders, driveId, mpgHighway, mpgCity and fuelTypeId. 
-- Ids should be integers. MPG should be decimals.
CREATE TABLE `vehicleNormal`(
`vehicleId` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
`makeId` int(11),
`modelId` int(11),
`year` int(11),
`cylinders` int(11),
`driveId` int(11),
`mpgHighway`  decimal(10,2),
`mpgCity` decimal(10,2),
`fuelTypeId` int(11)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ************* Question 9: *************
-- To increase the speed of the queries we will run in the next question, create four indexes on the vehicle table for the columns: make, model, drive, fuelType.
CREATE INDEX makeId
ON vehicleNormal (makeId);

CREATE INDEX modelId
ON vehicleNormal (modelId);

CREATE INDEX driveId
ON vehicleNormal (driveId);

CREATE INDEX fuelTypeId
ON vehicleNormal (fuelTypeId);

-- ************* Question 10: ************
-- Populate vehicleNormal by joining the vehicle, vehicleMake, vehicleModel, vehicleDrive and vehicleFuelType tables.
insert into vehicleNormal(makeId, modelId, year, cylinders, driveId, mpgHighway, mpgCity, fuelTypeId)(
select makeId, modelId, year, cylinders, driveId, mpgHighway, mpgCity, fuelTypeId
from vehicle as v
join vehicleDrive on v.drive = vehicleDrive.drive
join vehicleFuelType on v.fueltype = vehiclefueltype.fueltype
join vehicleMake on v.make = vehicleMake.make
join vehicleModel on v.model = vehicleModel.model
);

-- ************* Question 11: ************
-- Write a select statement to return the following fields: vehicle Id, make, model, year, drive, fuel type. 
-- Do not use the vehicle table, instead use the 5 new tables we just created.
select vehicleId, make, model, year, drive, fueltype
from vehiclenormal as v
join vehicleDrive on v.driveId = vehicleDrive.driveId
join vehicleFuelType on v.fueltypeId = vehiclefueltype.fueltypeId
join vehicleMake on v.makeId = vehicleMake.makeId
join vehicleModel on v.modelId = vehicleModel.modelId;

