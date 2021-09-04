drop table if exists user;
create table user (    
    id integer not null primary key autoincrement,
    name varchar(80) not null,    
    age integer not null,    
    license_number integer not null,
    license_type varchar(80) not null
); 
insert into user values (null, "Sherry", "29", "10000100", "C Car");
insert into user values (null, "Tom", "20","10000101", "LR Light rigid");
insert into user values (null, "Jade", "27", "10000102", "C Car");
insert into user values (null, "Wang", "38","10000103", "C Car");
insert into user values (null, "Luke", "35","10000104", "C Car");
insert into user values (null, "Max", "32","10000105", "C Car");
insert into user values (null, "Wayne", "30","10000106", "C Car");
insert into user values (null, "Ken", "41","10000107", "C Car");
insert into user values (null, "Alex", "54","10000108", "C Car");
insert into user values (null, "Hellen", "36","10000109", "C Car");