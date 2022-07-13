
const API_KEY = '2fa068cac41b91284b8fae107e0f1ed9';

const now = new Date();


//set up city for easy changing if pi changes location
let city = "Tauranga";
const cityName = document.getElementById("city");
cityName.innerText = city;

let tempField = document.getElementById("textfieldTemp");
let pressureField = document.getElementById("pressureField");
let humidityField = document.getElementById("humidityField");


document.getElementById("time").innerText = date.format(now, 'hh:mm A [GMT]Z', true);
async function getWeather(city){
    try {          
    const weather = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${API_KEY}`, {mode: 'cors'});
    const data = await weather.json();   
    let temp = data.main.temp;
    let pressure = data.main.pressure;
    let humidity = data.main.humidity;
    tempField.innerText = `Temperature: ${temp} degrees (celcius)`; 
    pressureField.innerText = `Pressure: ${pressure}`;
    humidityField.innerText = `Humidity: ${humidity}`;

}
    catch (error) {
        tempField.innerText = "404 error invalid API call";
    }
    
}

getWeather(city);