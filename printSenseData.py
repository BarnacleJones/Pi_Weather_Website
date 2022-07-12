from sense_hat import SenseHat
from datetime import datetime
from csv import writer


sense = SenseHat()

timestamp = datetime.now()
delay = 30

all_data = []

def get_sense_data():
    sense_data = []
    sense_data.append(sense.get_temperature())
    sense_data.append(sense.get_pressure())
    sense_data.append(sense.get_humidity())
    sense_data.append(datetime.now())
    return sense_data

   
while True:
    data = get_sense_data()    
    dt = data[3] - timestamp
    if dt.seconds > delay:
        all_data.append(data)
        with open('data.csv', 'w', newline='') as f:
            data_writer = writer(f)
            data_writer.writerow(['temp','presure', 'humidity', timestamp])
            data_writer.writerows(all_data)
        timestamp = datetime.now()
    
    






