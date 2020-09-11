class App {
  constructor () {
    //console.log("Started");
    this.getLocation();
    this.lati;
    this.longi;
    this.getNasa();
  }

  getLocation() {
    navigator.geolocation.getCurrentPosition(
      this.gotLocation.bind(this),
      this.errorLocation.bind(this),
    );
  }

  gotLocation(result) {
    //console.log(result);
    this.lati = result.coords.latitude;
    this.longi = result.coords.longitude;
    //console.log(this.lat);
    this.getWeather();
  }

  getWeather() {

    let url = `https://cors-anywhere.herokuapp.com/https://api.darksky.net/forecast/b2e86af901ea8b2c437ade2eaf11a688/${this.lati},${this.longi}?units=si`; //API

    fetch(url).then(response => {
      //console.log(response);
      return response.json();

    }).then(data => {
      //console.log(data);
      let iconWeather = data.currently.icon;
      let summaryText = data.currently.summary;
      let tempDegrees = Math.round(data.currently.temperature);

      document.querySelector("#temp").innerHTML = tempDegrees + " °C";
      document.querySelector("#summary").innerHTML = summaryText;

      switch (iconWeather) {

        case 'clear-day':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/979/979585.svg";
          break;

        case 'rain':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/414/414966.svg";
          break;

        case 'cloudy':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/414/414927.svg";
          break;

        case 'thunderstorm':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/1146/1146860.svg";
          break;

        case 'clear-night':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/547/547433.svg";
          break;

        case 'snow':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/2076/2076840.svg";
          break;

        case 'partly-cloudy-day':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/426/426818.svg";
          break;

        case 'wind':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/785/785125.svg";
          break;

        case 'partly-cloudy-night':
          document.getElementById("pictogram").src = "https://image.flaticon.com/icons/svg/624/624106.svg";
          break;
      }

    }).catch(err => {
      console.log(err);
    });
  }

  errorLocation(err) {
    console.log(err);
  }

  getNasa() {
    let nasaApi = `https://cors-anywhere.herokuapp.com/https://api.nasa.gov/planetary/apod?api_key=OdK8OKuUsdWblic7IjkamLMGbpf0akdYwDhFpugR`;
    //echo nasaApi;

    fetch(nasaApi).then(response => {
      console.log(response);
      return response.json();

    }).then(data => {
      console.log(data);
      let nasaPicture = data.url;
      document.querySelector("#nasa").src = nasaPicture;
      document.querySelector("#nasaTitle").innerHTML = data.title;




    });
  }
}
  let app = new App();