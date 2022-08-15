--all incorrect
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
('a', 'thirty', '1001', '67% humidity', 1, '30', '1011', '65')

--first correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 'thirty', '1001', '67% humidity', 1, '30', '1011', '65')

--up to second correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 30, '1001', '67% humidity', 1, '30', '1011', '65')

--up to third correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 30, 1001, '67% humidity', 1, '30', '1011', '65')

--up to fourth correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 30, 1001, 67, 1, 'thirty', '1011', '65')

--up to fifth correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 30, 1001, 67, 1, 30, 'one o one one', '65')

--up to sixth correct
INSERT INTO `sense_data` (roomID, temp_reading, press_reading, humid_reading, timestamp, forcasted_temp, forcasted_press, forcasted_humid) VALUES
(1, 30, 1001, 67, 1, 30, 1001, 'sizty 5')
