create Database hiTech;
use hiTech;
create table role(
roleID varchar(5),
roleDesc varchar(50) NOT null,
primary key(roleID)
);
insert into role(roleID,roleDesc) values("R1","admin"),
("R2","technician"),("R3","customer");

create table user(
userID int auto_increment,
userName varchar(50),
userPass varchar(50),
userEmail varchar(50) unique,
userPoint int,
userRoleID varchar(5),
primary key(userID),
foreign key(userRoleID) references role(roleID)
);
create table redeemItem(
itemID varchar(5),
itemPicUrl varchar(255),
itemDesc varchar(255),
itemPoint int,
itemQty int,
primary key(itemID)
);
insert into redeemItem(itemID,itemPicUrl,itemDesc,itemPoint,itemQty)
values('IT001','redeem/IT001.webp','Flashdisk 32GB',20,10),('IT002','redeem/IT002.webp','Flashdisk 64GB',35,10);