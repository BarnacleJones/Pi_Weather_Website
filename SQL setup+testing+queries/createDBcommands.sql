CREATE TABLE rooms (roomID INT NOT NULL PRIMARY KEY, roomName varchar(10) NOT NULL);

INSERT INTO rooms(roomID, roomName) VALUES
(1, 'spare'),
(2, 'kitchen'),
(3, 'lounge'),
(4, 'bedroom');



CREATE TABLE sense_data ( 
readingID INT PRIMARY KEY AUTO_INCREMENT, 
roomID INT, 
FOREIGN KEY (roomID) REFERENCES rooms(roomID), 
temp_reading INT NOT NULL, 
press_reading INT NOT NULL, 
humid_reading INT NOT NULL, 
timestamp varchar(50) NOT NULL, 
forcasted_temp INT NOT NULL, 
forcasted_press INT NOT NULL, 
forcasted_humid INT NOT NULL );

//took ages to get that syntax right for foreign key
