from sense_hat import SenseHat
from datetime import datetime
import mysql.connector

#initialise sense hat
sense = SenseHat()

#get the time
timestamp = datetime.now()

#set delay to whatever (30 is 30 seconds)
delay = 30

#open connection/create cursor
db = mysql.connector.connect(host ="localhost", user="root", password="raspberry pi yum yum", database="sense_data")
mycursor = db.cursor()


#function to get the sense data and put it in an array
def get_sense_data():
    sense_data = []
    sense_data.append(sense.get_temperature())
    sense_data.append(sense.get_pressure())
    sense_data.append(sense.get_humidity())
    sense_data.append(datetime.now())
    return sense_data


#set a loop so program continually gets the sense data
while True:
    data = get_sense_data()
    #calculate how much time has passed
    dt = data[3] - timestamp
    #if the appropriate delay has passed, send to db
    if dt.seconds > delay:
        insert_command = "INSERT INTO `data` (`TEMPERATURE`, `PRESSURE`, `HUMIDITY`, `TIMESTAMP`) VALUES ('{}', '{}', '{}', '{}');".format(data[0], data[1], data[2], data[3])
        mycursor.execute(insert_command)
        db.commit()
        timestamp = datetime.now()
    
    







