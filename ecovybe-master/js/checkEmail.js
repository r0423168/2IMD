let emailInput = document.querySelector("#exampleInputEmail1");

if (emailInput) {
    emailInput.addEventListener("blur", () => {
        console.log("blur");
        checkEmail();
    });
}

function checkEmail() {
    let formData = new FormData();
    let email = emailInput.value;
    formData.append('email', email);

    fetch('ajax/checkEmail.php', {
        method: 'POST',
        body: formData
    })
        .then((response) => response.json())
        .then((result) => {
            let available = document.querySelector("#available");

            console.log(result);

            if (result[ 'status' ] === "success") {
                available.innerHTML = "<p>✔ Email is beschikbaar.</p>";
            } else {
                available.innerHTML = "<p>❌Email is bezet.</p>";
            }

        })
        .catch((error) => {
            console.error('Error:', error);
        });
}