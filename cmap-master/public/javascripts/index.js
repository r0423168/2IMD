const base_url = "https://coronamaplisa.herokuapp.com";
let parent = document.querySelector("#summaries");

let primus = Primus.connect(base_url, {
    reconnect: {
      max: Infinity ,
      min: 500,
      retries: 10 
    }
  });

  primus.on('data', (json) => {
    const element = document.querySelector(`[data-country='${json.country}']`);
    element.querySelector("p").innerHTML = json.number;
  });

  function showSummaries() {
	  fetch(base_url + "/api/v1/stats", {
      method: "get",
      headers: {'Content-Type': 'application/json'},
	  }).then(response => {return response.json();
	  }).then(json => {json.data.forEach(statistics => {
        let container = document.getElementById("summaries");
        container.innerHTML += `<div data-country="${statistics.country}"><h2>${statistics.country}</h2><p>${statistics.number}</p></div>`;
        });
	    });
    }
	
	window.onload = showSummaries();
