queries



-Which time/room was temperature the lowest?  

SELECT S.roomID, S.temp_reading, S.timestamp, R.roomName FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID ORDER BY S.temp_reading ASC




-Which time/room was temperature the highest?


SELECT S.roomID, S.temp_reading, S.timestamp, R.roomName FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID ORDER BY S.temp_reading DESC;




-Which time/room was humidity the highest?


SELECT S.roomID, S.humid_reading, S.timestamp, R.roomName FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID ORDER BY S.humid_reading ASC





-Which time/room was humidity the lowest?


SELECT S.roomID, S.humid_reading, S.timestamp, R.roomName FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID ORDER BY S.temp_humid DESC




-What reading of temperature was furthest from the forcasted - in which room and what time?


SELECT S.roomID, R.roomName, S.timestamp, S.temp_reading, S.forcasted_temp, (S.temp_reading-S.forcasted_temp) AS 'Variation'  FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID  
ORDER BY `Variation` DESC



-What reading of the humidity was furthest from the forecasted - in which room and what time?


SELECT S.roomID, R.roomName, S.timestamp, S.humid_reading, S.forcasted_humid, (S.forcasted_humid-S.humid_reading) AS 'Variation'  FROM sense_data S INNER JOIN rooms R on S.RoomID=R.roomID  
ORDER BY `Variation` DESC

