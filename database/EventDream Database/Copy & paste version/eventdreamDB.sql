drop database if exists b00128390;
create database b00128390;
use b00128390;

drop user if exists 'B00128390'@'localhost';
Create user 'B00128390'@'localhost' identified by 'uUTPHHG5';
Grant all privileges on B00128390.* to 'B00128390'@'localhost';

	create table customer (
		 id int auto_increment,
         firstname char(15),
         surname char(15),
         dob date,
         age int,
         phone int(9),
         email varchar(30),
         addressline1 varchar(40),
         addressline2 varchar(40),
         city varchar(25),
         eircode varchar(7),
         cardno bigint(16),
         cardexpiry varchar(7),
         cvv int(3),
         username varchar(20),
         pass varchar(30),
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
		   primary key(id)
 );
 
 	create table user (
		 id int auto_increment,
         usertype varchar(20),
         firstname char(15),
         surname char(15),
         dob date,
         age int,
         phone int(9),
         email varchar(30),
         addressline1 varchar(40),
         addressline2 varchar(40),
         city varchar(25),
         eircode varchar(7),
         iban varchar(30),
         bic varchar(20),
         lisenceno int(10),
         insurance int(10),
         username varchar(20),
         pass varchar(30),
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id)
);

 	create table venue (
		 id int auto_increment,
         venuename varchar(40),
         addressline1 varchar(40),
         addressline2 varchar(40),
         city varchar(25),
         eircode varchar(7),
         indoor boolean,
         humancapacity int,
         costtorent decimal(8,2),
         userid int,
         lat double,
         lng double,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(userid) references user(id)
);

 	create table product (
		 id int auto_increment,
         productname char(15),
         producttype char(15),
         productdesc text(50),
         productcost decimal(18,2),
         productlocation varchar(30),
         productquantity int,
         productimg longblob,
         userid int,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(userid) references user(id)
);

 	create table booking (
		 id int auto_increment,
         bookedprodquantity int,
         bookeddate date,
         bookedtime time,
         productid int,
         venueid int,
         created_at datetime,
		 updated_at datetime,
		 deleted_at datetime,
         primary key(id),
         foreign key(productid) references product(id),
         foreign key(venueid) references venue(id)
);

 	create table shift (
		 id int auto_increment,
         starttime time,
         endtime time,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id)
);

 	create table roster (
		 id int auto_increment,
         rostershiftdate date,
         shiftid int,
         userid int,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(shiftid) references shift(id),
         foreign key(userid) references user(id)
);

 	create table menuitem (
		 id int auto_increment,
         menuitemname varchar(20),
         menuitemdesc text(50),
         menuitemnutrition text(50),
         menuitemallergens text(50),
         menuitemcost decimal(8,2),
         menuitemimglink longblob,
         userid int,
         course varchar(20),
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(userid) references user(id)
);

 	create table standardmenu (
		id int auto_increment,
        standardmenuname varchar(20),
        style varchar(20),
        course varchar(20),
        description text,
        userid int,
        created_at datetime,
		  updated_at datetime,
		  deleted_at datetime,
        primary key(id),
        foreign key(userid) references user(id)
);

create table standardmenuimages (
	id int auto_increment,
	standardmenuid int,
	imagefile longblob,
	created_at datetime,
	updated_at datetime,
	deleted_at datetime,
	primary key(id),
	foreign key(standardmenuid) references standardmenu(id)
);

	create table standardmenurating (
	    id int auto_increment,
	    rating int,
	    comment text,
	    created_at datetime,
	    updated_at datetime,
	    deleted_at datetime,
	    standardmenuid int,
	    customerid int,
	    primary key(id), 
		foreign key(standardmenuid) references standardmenu(id),
		foreign key(customerid) references customer(id)
);

 	create table custommenu (
		id int auto_increment,
        custommenuname varchar(20),
        description text,
        customerid int,
        created_at datetime,
		  updated_at datetime,
		  deleted_at datetime,
        primary key(id),
        foreign key(customerid) references customer(id)
);

 	create table standardmenulog (
		 id int auto_increment,
         menuitemid int,
         standardmenuid int,
         primary key(id),
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         foreign key(menuitemid) references menuitem(id),
         foreign key(standardmenuid) references standardmenu(id)
);

 	create table custommenulog (
		 id int auto_increment,
         menuitemid int,
         custommenuid int,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(menuitemid) references menuitem(id),
         foreign key(custommenuid) references custommenu(id)
);

 	create table event (
		 id int auto_increment,
		 eventname varchar(20),
         eventdate date,
         eventtime time,
         orderplacedon datetime,
         eventordertotal decimal(8,2),
         eventdiscount int,
		 numOfGuests int,
		 eventstatus varchar(7),
         venueid int,
         customerid int,
         userid int,
         standardmenuid int,
         custommenuid int,
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(venueid) references venue(id),
         foreign key(customerid) references customer(id),
         foreign key(userid) references user(id),
         foreign key(standardmenuid) references standardmenu(id),
         foreign key(custommenuid) references custommenu(id)
);

 	create table eventproductlog (
		 id int auto_increment,
		 	eventdate date,
         eventproductquantity int,
         eventid int,
         productid int,
         totalcost decimal(8,2),
         created_at datetime,
		   updated_at datetime,
		   deleted_at datetime,
         primary key(id),
         foreign key(eventid) references event(id),
         foreign key(productid) references product(id)
);

	create table venuerating (
	    id int auto_increment,
	    rating int,
	    comment text,
	    created_at datetime,
	    updated_at datetime,
	    deleted_at datetime,
	    venueid int,
	    customerid int,
	    primary key(id), 
		foreign key(venueid) references venue(id),
		foreign key(customerid) references customer(id)
);


DROP VIEW IF EXISTS venueevents;
CREATE VIEW venueevents AS
SELECT venuename as title,
       DATE_FORMAT(CONCAT(eventdate, ' ', eventtime), '%Y-%m-%dT%T') as date,
       venueid,
       event.id
FROM venue, event
WHERE venue.id = event.venueid;

create table venueimages (
	id int auto_increment,
	venueid int,
	imagefile longblob,
	created_at datetime,
	updated_at datetime,
	deleted_at datetime,
	primary key(id),
	foreign key(venueid) references venue(id)
); 

insert into user(usertype,firstname,surname,dob,phone,email,addressline1,addressline2,city,eircode,iban,bic)
values
  ("admin","arina","moroz","2001-07-27","552542607","armoroz@mail.com","655-4479 condimentum. st.","ap #736-7144 lorem, st.","dublin","y61m6b4","lu859936614614529122","icqy8687"),
  ("admin","shalini","kuruguntla","2001-02-12","534138919","kaseem@rocketmail.com","ap #252-588 adipiscing. av.","p.o. box 420, 861 ut st.","galway","l99f9e1","cy54331141378874498246751448","yinx0222"),
  ("admin","endy","ukandu","1997-05-04","557316138","cooper4646@yahoo.com","904-104 vitae st.","5833 velit avenue","galway","h42x5n9","sm5875778779469376265712508","kifp7525"),
  ("driver","buckminster","hobbs","1963-02-14","354923868","buckminster9657@aol.couk","ap #694-3936 dictum st.","4621 conubia rd.","dublin","f03b6z4","fo3929882463322385","ofko5348"),
  ("driver","hope","mccarty","1961-10-10","589383570","hope@outlook.org","941-8787 pellentesque rd.","4888 quis rd.","galway","o17b7o5","tn7203488413486851953154","ccnz4695");

insert into shift(starttime, endtime)
values
	("09:00","14:00"),
    ("14:00","20:00"),
    ("10:00","18:00");

insert into roster(userid,rostershiftdate,shiftid)
values
	(1,"2022-01-14",1),
    (1,"2022-08-15",1),
    (1,"2022-09-14",2),
    (1,"2022-10-15",2),
    (1,"2022-12-15",3),
    (1,"2022-12-16",3),
    (1,"2022-12-17",2),
    (1,"2022-12-18",3);
    
insert into venue(venuename,addressline1,addressline2,city,eircode,indoor,humancapacity,costtorent,lat,lng)
values
	("crown plaza restaurant","4 bell view","high road","dublin","d01g9h8",1,"200",100.00,53.4111521,-6.4453544),
    ("eddie rockets","3 bell ave","dirt road","dublin","d01g9j5",0,"500",150.00,53.3775429,-6.3881992),
    ("powerscourt garden ballroom","40 bell lane","crown plaza","dublin","d15s3h8",1,"400",95.00,53.4728919,-6.2738282),
    ("malahide castle bar","50 bell ave","donan road","dublin","d01g9j6",1,"150",250.00,53.4839292,-6.3728939),
    ("halfway house","50 bell ave","donan road","dublin","d01g9j6",0,"150",160.00,53.3701588,-6.4157696),
    ("the hole in the wall","51 bell ave","donan road","dublin","d01g9l0",0,"150",100.00,53.3772317,-6.4146323),
    ("academy","52 bell ave","donan road","dublin","d01g9k8",1,"500",300.00,53.3716289,-6.4463722);
    
insert into menuitem(menuitemname,menuitemdesc,menuitemnutrition,menuitemallergens,menuitemcost,course)
values
	("lasagne","blends of pasta, cheese, and beef","per 100g: salt 10g, sugar 2g, calories:500, carbs 20g","may contain dairy, soy, gluten",12.00,"main"),
    ("pizza","stonebaked","salt 10g","dairy",15.00,"main"),
    ("spaghetti bolognes","stonebaked","salt 10g","dairy",15.00,"main"),
    ("bbq wings","stonebaked","salt 10g","dairy",15.50,"starter"),
    ("garlic bread","stonebaked","salt 10g","dairy",20.00,"starter"),
    ("chicken burger","stonebaked","salt 10g","dairy",10.00,"main"),
    ("salmon","stonebaked","salt 10g","dairy",19.00,"main"),
    ("brownie","stonebaked","sugar 10g","dairy",6.00,"desert"),
    ("cheescake","stonebaked","sugar 10g","dairy",12.00,"desert");

insert into standardmenu(standardmenuname,style,course,description)
values
	("kids menu","fun","starter","orange juice etc"),
    ("irish","fancy","main","beans etc"),
    ("italian","trendy","desert","gelato etc");
    
insert into standardmenulog(menuitemid,standardmenuid)
value
	(4,1),
    (1,1),
    (8,1),
    (5,2),
    (2,2),
    (9,2),
    (4,3),
    (1,3),
    (2,3),
    (8,3),
    (9,3);
    
insert into custommenu(custommenuname,description)
values
	("eve's 10th bday","cheese pizza with coke"),
    ("tom's anniversary","steak with red wine"),
    ("steve's retirement","grilled chicken and beer");
    
insert into custommenulog(menuitemid,custommenuid)
values
	(4,1),
    (5,1),
    (6,1),
    (9,1);
    
insert into product(productname,producttype,productdesc,productcost,productlocation,productquantity,userid)
values
	("elegance","drape","white silk",10.00,"warehouse",30,1),
    ("elegance","chair","white leather",10.00,"warehouse",100,1),
    ("elegance","table","white wood",10.00,"warehouse",50,1),
    ("standard","drape","light pink silk",10.00,"warehouse",30,1),
    ("standard","chair","gold plastic",10.00,"warehouse",50,1),
    ("standard","table","brown wood",10.00,"warehouse",100,1),
    ("flower","flower","white daisy buquet",5.00,"d05f9d4",30,1),
    ("flower","flower","red rose buquet",10.00,"d05f9d4",25,1),
    ("flower","flower","white rose buquet",10.00,"d05f9d4",10,1),
    ("flower","flower","orange rose buquet",10.00,"d05f9d4",15,1);

insert into event(eventdate,eventtime,orderplacedon,venueid,userid,standardmenuid,custommenuid)
values
	("2023-01-05","09:00","2022-11-20 09:00",1,1,1,null),
    ("2022-12-05","18:00","2022-11-21 10:00",3,2,null,1),
    ("2023-01-06","12:00","2022-11-22 11:00",4,3,3,null),
    ("2023-01-10","20:00","2022-11-23 12:40",6,1,1,null),
    ("2023-01-11","10:00","2022-11-24 21:17",7,1,2,null);

insert into eventproductlog(eventid,productid,eventproductquantity)
values
	(1,1,2),
    (1,2,100),
    (1,3,20),
    (1,9,20),
    (2,1,1),
    (2,5,20),
    (2,6,10),
    (2,8,5),
    (2,8,5),
    (3,9,15),
    (3,8,15),
    (4,8,15),
    (4,9,15),
    (4,10,15),
    (5,7,10);

insert into booking(productid,bookedprodquantity,venueid,bookeddate,bookedtime)
values
	(1,2,null,"2023-01-05","09:00"),
    (null,null,1,"2023-01-05","09:00");

insert into event(eventdate,eventtime,venueid)
values
	("2023-03-13","18:00",1),
	("2023-03-12","20:00",1),
	("2023-01-05","09:00",4),
	("2023-01-06","10:00",4),
	("2023-01-07","09:00",4),
	("2023-01-08","11:00",3),
	("2023-01-09","18:00",6),
	("2023-03-10","20:00",6),
	("2023-03-14","18:00",1),
	("2023-03-16","20:00",2),
	("2023-03-17","18:00",1),
	("2023-03-18","20:00",2),
	("2023-03-19","23:00",7);