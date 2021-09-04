drop table if exists booking;
create table booking (    
    id integer not null primary key autoincrement,
    user_id integer not null, 
    user_name varchar(80) not null,  
    user_license_number integer not null,  
    vehicle_id integer not null,    
    starting_date date not null,
    starting_time time not null,
    returning_date date not null,
    returning_time time not null
); 
