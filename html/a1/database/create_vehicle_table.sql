drop table if exists vehicle;
create table vehicle (    
    id integer not null primary key autoincrement,
    rego nvarchar(6) not null,    
    model varchar(80) not null,    
    year integer not null,
    odometer integer not null
); 
insert into vehicle values (null, "QLD100",  "Toyota", "2010", "23000");
insert into vehicle values (null, "QLD101", "Honda", "2004", "13000");
insert into vehicle values (null, "QLD102",  "BMW", "2011", "26000");
insert into vehicle values (null, "QLD103", "Toyota", "2020", "43000");
insert into vehicle values (null, "QLD104", "Audi", "2015", "39000");
insert into vehicle values (null, "QLD105", "Audi", "2017", "45043");
insert into vehicle values (null, "QLD106", "BMW", "2013", "35040");
insert into vehicle values (null, "QLD107", "Tesla", "2018", "15900");
insert into vehicle values (null, "QLD108", "Subaru", "2014", "78670");
insert into vehicle values (null, "QLD109", "Toyota", "2003", "104000");