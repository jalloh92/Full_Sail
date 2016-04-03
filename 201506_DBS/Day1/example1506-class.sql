select * from users;

select userId, firstname, lastname from users;
-- Comments
select userId, firstname, lastname 
from users
where firstname = 'john'
and (dob > '1980-01-01' or lastname = 'Khum');

select users.userId, firstname, lastname, userEmail, userEmailType
from users
join userEmail on users.userId = userEmail.userId
join userEmailType
on userEmailType.userEmailTypeId = userEmail.userEmailTypeId;

insert into users (userId, firstname, lastname, username, password, dob, userStatusId, userTypeId)
values('abc', 'Kelly', 'Rhodes', 'karhodes', '12345', '1970-01-01', 1, 1);

select * from users where userId = 'abc';

update users set 
lastname = 'Happy',
password = '54321'
where userId = 'abc';

delete from users
where userID = 'abc';


