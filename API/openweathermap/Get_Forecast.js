//CODE BELOW HAS BEEN COPIED AND MODIFED FROM " Andy Truong "
// YOUTUBE THAT WAS FOLLWED : https://www.youtube.com/watch?v=JubKY5p3qRc




 const apiKey = '76a234bebf97e7c7949f9c7ef66d2498';

const WeatherDisplay = document.getElementById("weather");
const city = document.getElementById("city");
const error = document.getElementById('error');
const CurrentWeatherDisplay = document.getElementById('CurrentWeather');

const units = 'metric'; //imperial or metric
let temperatureSymobol = units == 'imperial' ? "°F" : "°C";


function forecastOpt(opt){
    if(opt === 1){
        fetchForecast();
    }else{
        fetchForecastPlus();
    }
}





async function fetchForecast() {
    try {
        WeatherDisplay.innerHTML = '';
        error.innerHTML = '';
        city.innerHTML = '';


        const cnt = 8;
        const cityInputtedByUser = document.getElementById('cityInput').value;

        const apiUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${cityInputtedByUser}&appid=${apiKey}&units=${units}&cnt=${cnt}`;

        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.cod == '400' || data.cod == '404') {
            error.innerHTML = `City Entered is Invalid`;
            return;
        }

        data.list.forEach(hourlyWeatherData => {
            const hourlyWeatherDataDiv = createForecastDescription(hourlyWeatherData);
            WeatherDisplay.appendChild(hourlyWeatherDataDiv);
        });

        city.innerHTML = `Hourly Weather for ${data.city.name}`;

        

    } catch (error) {
        console.log(error);
    }

}


async function fetchForecastPlus() {
    // try {
    //     WeatherDisplay.innerHTML = '';
    //     error.innerHTML = '';
    //     city.innerHTML = '';


    //     const cnt = 8;
    //     const cityInputtedByUser = document.getElementById('cityInput').value;

    //     const apiUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${cityInputtedByUser}&appid=${apiKey}&units=${units}&cnt=${cnt}`;

    //     const response = await fetch(apiUrl);
    //     const data = await response.json();

    //     if (data.cod == '400' || data.cod == '404') {
    //         error.innerHTML = `City Entered is Invalid`;
    //         return;
    //     }

    //     data.list.forEach(hourlyWeatherData => {
    //         const hourlyWeatherDataDiv = createForecastDescription(hourlyWeatherData);
    //         WeatherDisplay.appendChild(hourlyWeatherDataDiv);
    //     });

    //     city.innerHTML = `Hourly Weather for ${data.city.name}`;

        

    // } catch (error) {
    //     console.log(error);
    // }

}


function convertToLocalTime(dt) {

    //CODE BELOW WAS LEFT UNCHANGED AND MODIFIED 

    const date = new Date(dt * 1000);

    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); 
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours() % 12 || 12).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const period = date.getHours() >= 12 ? 'PM' : 'AM';

    return `${year}-${month}-${day} ${hours}:${minutes} ${period}`;

}

function createForecastDescription(weatherData) {
    const { main, dt , weather} = weatherData;

    const description = document.createElement("div");
    const convertedDateAndTime = convertToLocalTime(dt);


    description.innerHTML = `

        <div class = "weatherdescription" >
        
        <h2> Time : ${convertedDateAndTime.substring(10)} </h2>
        <h2> Date : ${convertedDateAndTime.substring(5, 10)} </h2>

        <h3> Tempeture : ${main.temp}${temperatureSymobol} </h3>
        <h3> humidity : ${main.humidity}% </h3>
        <h3> Condition : ${weather.description}</h3>
        
        </div>

    `;
    return description;
}
