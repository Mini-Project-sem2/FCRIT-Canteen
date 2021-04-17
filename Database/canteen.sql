create database CANTEENDB

USE CANTEENDB
CREATE TABLE Costumers (
username VARCHAR(30),
id INT PRIMARY KEY NOT NULL  ,
Mobile_no VARCHAR(10) ,
pass VARCHAR(30),
Priority TEXT,
Balance INT);

INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Farhan',1019128,'8369513508','12345678','No',120);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Aditiya U',1019101,'8369513501','12345678','No',120);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Rishika A',1019102,'8369513502','12345678','No',140);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Cristopher J',1019103,'8369513503','12345678','No',70);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Anushka P',1019104,'8369513504','12345678','No',200);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Anna J',1019105,'8369513505','12345678','No',110);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Mr.Amroz S',2054204,'8369513510','12345678','Yes',300);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'Mrs.Shagufta R',2054205,'8369513510','12345678','Yes',210);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'admin',2054206,'8369513510','12345678','Yes',210);
INSERT INTO Costumers (username,id,mobile_no,pass,priority,Balance) VALUES( 'canteen',2054207,'8369513510','12345678','Yes',210);

CREATE TABLE Menu (
Fid INT PRIMARY KEY NOT NULL ,
Fname VARCHAR(30) NOT NULL,
Fdes varchar(300) ,
Price INT not null);

INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0101, 'red sause pasta', 'A great classic italian flavours that will blow your mouth with the burst of classic flavours', 180);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0102, 'pav bhaji', 'Pav Bhaji is a spicy mashed vegetable dish, served piping hot with a dollop of butter, diced red onions, cilantro and a squeeze of lime. Accompanied by warm buttery pan-toasted pavs!!', 156);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0201, 'Tandoori', 'A classic Indian chicken that is marinated with Indian spices until well coated and then cooked in an Indian oven called the tandoor as it is popularly known.', 180);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0202, 'Aloo Paratha', 'Indian Aloo Paratha – whole wheat flatbread stuffed with a spicy potato filling. This paratha is best enjoyed with yogurt, pickle and butter.', 156);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0301, 'Masala Dosa', 'The king of all dosas! Listed as one of the world''s most delicious foods, a masala dosa never fails to impress!', 60);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0302, 'Hyderabadi chicken biryani', 'Hyderabadi chicken biryani is an aromatic, mouth watering and authentic Indian dish with succulent chicken in layers of fluffy rice, fragrant spices and fried onions!!', 120);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0401, 'Hakka Noodles', 'The most sophisticated version of the common ChowMien. The Noodles are stir fried with Vegetables, Soy sauce, sometimes Eggs and Chicken too.', 70);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0402, 'Schezwan Fried Rice', 'schezwan fried rice is hot & spicy with bursting flavors of ginger, garlic, soya sauce & red chilli paste!!!', 100);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0501, 'Lassi', 'Lassi, a creamy, frothy yogurt-based drink, blended with water and various fruits or seasonings!!!', 40);
INSERT INTO Menu(Fid,Fname, Fdes,Price) VALUES(0502, 'Lemonade', 'Lemonade is a sweetened lemon-flavored beverage...', 20);


CREATE TABLE Orderlist (
Sr_no INT  AUTO_INCRIMENT,
userid INT NOT NULL UNIQUE,
username VARCHAR(30) ,
Foodname VARCHAR(15),
FoodId INT NOT NULL UNIQUE ,
Quantity INT,
price INT,
Order_Status varchar(10),
orderdate varchar(15),
diliverdate varchar(15)
);

CREATE TABLE CurrOrderlist (
userid INT NOT NULL UNIQUE,
username VARCHAR(30) ,
Foodname VARCHAR,
FoodId INT NOT NULL UNIQUE ,
Quantity INT,
price INT
);
