select count(*) from log_all;

-- 1. Three of the supporting tables, "log_areas", "log_pages", and "log_referers", use auto-increment IDs for primary keys. 
-- These keys have already been created. The fourth table, "log_clients" is going to use some different logic for its ID field, and it will not be an auto-increment identity column.  -- It still needs to be a primary key, so use an ALTER TABLE statement to make the "ID" column the primary key. 

ALTER TABLE log_clients
ADD PRIMARY KEY (ID);

-- 2. To ensure that the data normalized into these supporting tables is not duplicated, 
-- a unique index should be created on each of the text fields in each of those four supporting tables.  
-- Write four ALTER TABLE or CREATE UNIQUE INDEX statements to add these unique indexes.  
-- Note that while the "page" column in the "log_pages" table will have a unique index, the "filetype" column will not.

CREATE UNIQUE INDEX area
ON log_areas (area);

CREATE UNIQUE INDEX page
ON log_pages (page);

CREATE UNIQUE INDEX referer
ON log_referers (referer);

CREATE UNIQUE INDEX client_ip
ON log_clients (client_ip);

-- 3. Using an ALTER TABLE or CREATE INDEX statement, 
-- create a regular (non-unique) index on the "filetype" column in the "log_pages" table:

CREATE INDEX filetype
ON log_pages (filetype);

-- 4. The "log_hits" table uses a composite primary key that includes the "hit_date", "hit_time", and "hit_ms" columns.  
-- Use an ALTER TABLE statement to create this primary key:

ALTER TABLE log_hits 
ADD PRIMARY KEY(hit_date, hit_time, hit_ms);

-- 5. The "log_hits" table has foreign keys out to the supporting tables.  
-- Use four ALTER TABLE statements to add foreign keys for the "page_id", "client_id", "referer_id", and "area_id" columns.  
-- Make sure that the foreign keys are set to cascade updates and deletes.

ALTER TABLE log_hits
ADD FOREIGN KEY (client_id)
REFERENCES log_clients(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE log_hits
ADD FOREIGN KEY (page_id)
REFERENCES log_pages(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE log_hits
ADD FOREIGN KEY (area_id)
REFERENCES log_areas(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE log_hits
ADD FOREIGN KEY (referer_id)
REFERENCES log_referers(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

-- Use an INSERT-SELECT statement to populate the "log_areas" table.  
-- Make sure you don't insert any NULL or blank areas!
insert into log_areas(area)(
	select distinct(site_area)
	from log_all
	where site_area is not null
);

select count(*) from log_areas;

-- 7. Do the same for "log_referers".
insert into log_referers(referer)(
	select distinct(referer)
	from log_all
	where referer is not null
);

select count(*) from log_referers;

-- 8. Use an INSERT-SELECT statement to populate the "log_pages" table from your "log_all" table.  
-- The table has two non-identity columns: "page" and "filetype" -- be sure to include both of them. 
-- Make sure you don't insert any NULL or blank areas!
-- (Hint: Page = uri_stem)
insert into log_pages(page, filetype)(
	select distinct uri_stem, file_type
	from log_all
	where file_type is not null
);

select count(*) from log_pages;

-- 9. The "id" column for the "log_clients" table isn't an identity (auto-increment) column.  
-- Instead, it uses a natural key: the conversion of the dotted IP address to its numeric equivalent.  
-- The MySQL function INET_ATON can be used to remove the non-numeric characters from ip_client so the value can be inserted into log_clients.id.  
-- Use an INSERT-SELECT statement to populate your "log_clients" table. (Hint: log_clients.id=INET_ATON(ip_client), select INET_ATON(COLUMN) ...) 
insert into log_clients(id, client_ip)(
	select distinct INET_ATON(ip_client), ip_client
	from log_all
	where ip_client is not null
);

select count(*) from log_clients;

-- 10. With the supporting tables populated, you can now populate the "log_hits" table with an INSERT-SELECT statement, 
-- left joining with the "log_all" table with the supporting tables. 
-- (Hint: Use a left join on the lookup tables (All of them). Log_all is the primary table.)
insert into log_hits(hit_date, hit_time, hit_ms, method, page_id, uri_query, client_id, http_version, user_agent, referer_id, bytes_sent, bytes_rcvd, time_ms, area_id)
	(select hit_date, hit_time, hit_ms, method, log_pages.id, uri_query, log_clients.id, http_version, user_agent, log_referers.id, bytes_sent, bytes_rcvd, 		time_ms, log_areas.id
	from log_all
	left join log_areas on log_all.site_area = log_areas.area
	left join log_clients on log_all.ip_client = log_clients.client_ip
	left join log_referers on log_all.referer = log_referers.referer
	left join log_pages on log_all.uri_stem = log_pages.page
);

select count(*) from log_hits;

-- 11. The analysis later will include only the executed pages such as PHP and CFM files, and not any of the images, CSS, JavaScript, etc.  
-- Create a view named "log_scripts" that selects the "id", "page", and "filetype" columns of the "log_pages" table, but only for PHP and CFM files. 

CREATE VIEW log_scripts
AS select
   id, page, filetype
from log_pages
where filetype = "php"
or filetype = "cfm";

select count(*) from log_scripts;

-- 12. Create a view that only contains the hits to these PHP and CFM script files and name it "log_script_hits".  
-- It should be a join of the "log_hits" table to the "log_scripts" view.  
-- It should have all of the columns from the "log_hits" table, and none from the "log_scripts" view.  
-- (You're joining to the view only to filter out anything that isn't a script -- Do not to get extra columns.) 

CREATE VIEW log_script_hits
AS select
	hit_date, hit_time, hit_ms, method, page_id, uri_query, client_id, http_version, user_agent, referer_id, bytes_sent, bytes_rcvd, time_ms, area_id
from log_hits
inner join log_scripts on log_scripts.id = log_hits.page_id;

select count(*) from log_script_hits;

-- 13. Create a query to determine which script page (from "log_script_hits" joined to "log_pages") 
-- got the most hits. Use an order by but not a limit. 

select page, 
count(page_id) as num_hits
from log_pages
join log_script_hits on log_script_hits.page_id = log_pages.id
group by page
having num_hits > 0
order by num_hits desc;

-- 14. Filter the above query to only use CFM pages, not PHP.

select page, 
count(page_id) as num_hits
from log_pages
join log_script_hits on log_script_hits.page_id = log_pages.id
where filetype = "cfm"
group by page
having num_hits > 0
order by num_hits desc;

-- 15. Refactor the last query to include columns that get total, average, minimum, 
-- and maximum times spent rendering the content (from the "time_ms" column).
select page, 
count(page_id) as num_hits,
sum(time_ms) as total_time,
avg(time_ms) as avg_time,
min(time_ms) as min_time,
max(time_ms) as max_time
from log_pages
join log_script_hits on log_script_hits.page_id = log_pages.id
where filetype = "cfm"
group by page
having num_hits > 0
order by num_hits desc;


-- 16. Numbers1000 is a numbers table with the values 100 through 1000 (counting by 100's). 
-- Write a select statement to return the number of hits each 100 ms grouping took. 
-- (Hint: Use a scalar sub-query)













