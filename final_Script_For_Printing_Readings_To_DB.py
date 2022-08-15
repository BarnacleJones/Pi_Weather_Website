from sense_hat import SenseHat
from datetime import datetime
import mysql.connector
import requests
import time

########################################################################

#This script will get SenseHAT + weather data and push to a database


########################################################################
#Script settings


##set the room for readings
#1 - spare 2- kitchen, 3- lounge - 4- bedroom
roomID = 1

#set delay to whatever you want (30 is 30 seconds, 1800 is 30 minutes)
delay = 1800

#db connection settings + open connection/create cursor
db = mysql.connector.connect(host ="localhost", user="root", password="*****", database="assignment_two_database")
mycursor = db.cursor()

#API data settings
# API KEY
API_key = "2fa068cac41b91284b8fae107e0f1ed9"
# URL with metric units selected
base_url = "http://api.openweathermap.org/data/2.5/weather?units=metric&"
# Hard coded city ID
city_id = "2208032"
# This is final url. Concatenation of base_url, API_key and city_id
Final_url = base_url + "appid=" + API_key + "&id=" + city_id


#####################################################################

#Functions

########################################################################
#Function to make API call + return array with temp/humid/pressure
def get_weather_data():
	#create array to store values
	weather = []
	# this variable contain the JSON data which the API returns
	weather_data = requests.get(Final_url).json()
	#Temp
	forcastedTemp = weather_data['main']['temp']
	#Humidity
	forcastedHumidity = weather_data['main']['humidity']
	#Pressure
	forcastedPressure = weather_data['main']['pressure']
	weather.append(forcastedTemp)	
	weather.append(forcastedPressure)
	weather.append(forcastedHumidity)
	return weather


#function to get the sense data and put it in an array
def get_sense_data():
    sense_data = []
    sense_data.append(sense.get_temperature())
    sense_data.append(sense.get_pressure())
    sense_data.append(sense.get_humidity())
    sense_data.append(datetime.now())
    return sense_data


########################################################################

#initialise sense hat
sense = SenseHat()
#get the time
timestamp = datetime.now()

########################################################################

#Main program

#set a loop so program continually gets the sense data
while True:
    time.sleep(3)
    #calculate how much time has passed
    data = get_sense_data()  
    dt = data[3] - timestamp
    #if the appropriate delay has passed, make API call and send readings to db
    if dt.seconds > delay:
        weather = get_weather_data()
        insert_command = "INSERT INTO `sense_data` (`roomID`, `temp_reading`, `press_reading`, `humid_reading`, `timestamp`, `forcasted_temp`, `forcasted_press`, `forcasted_humid`) VALUES ('{}', '{}', '{}', '{}' , '{}' , '{}' , '{}' , '{}');".format(roomID, data[0], data[1], data[2], data[3], weather[0], weather[1], weather[2])
        mycursor.execute(insert_command)
        db.commit()
        timestamp = datetime.now()
        
########################################################################
        
    
    









