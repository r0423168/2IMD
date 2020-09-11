const base_url = "https://coronamaplisa.herokuapp.com";

let primus = Primus.connect(base_url, {
    reconnect: {
        max: Infinity, 
        min: 500, 
        retries: 10 
    }
});

//when click button --> revise numbers 
document.querySelector("#submit").addEventListener("click", function (e) {
    const that = this;
    const number = document.querySelector("#number").value
    const country = document.querySelector("#country").value;

    if(number<0){
      alert("Negative number not allowed");
    } else if (number === ""){
      alert("Numberfield cannot be empty");
    }else{
      fetch(base_url + "/api/v1/stats/" + country, {
        method: "put",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ number: number})
      }).then((e) => {
        if(e.status = 200) {
          primus.write({ country: country, number: number })
          alert("Updated number of cases");
        }
      });
    }
    e.preventDefault();
  });
  