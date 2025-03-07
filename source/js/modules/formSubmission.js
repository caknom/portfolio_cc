export function formSub() {
    const form = document.querySelector("#contact_form");
    const feedback = document.querySelector("#feedback");

    function regForm(event) {
        event.preventDefault();
        const thisform = event.currentTarget;
        const url = "sendmail.php";
        console.log(thisform.elements);
        const formdata = new URLSearchParams({
            name: thisform.elements.name.value,
            email: thisform.elements.email.value,
            msg: thisform.elements.msg.value
        }).toString();
        console.log(formdata);
        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formdata
        })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            feedback.innerHTML = "";
            if (response.errors) {
                response.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedback.appendChild(errorElement);
                });
            } else {
                form.reset();
                const messageElement = document.createElement("p");
                messageElement.textContent = response.message;
                feedback.appendChild(messageElement);
            }
            feedback.scrollIntoView({ behavior: 'smooth', block: 'end' });
        })
        .catch(error => {
            console.log(error);
            feedback.innerHTML = `<p>Sorry there seems to be an issue. Either you're using an older browser or JavaScript is disabled.</p>`;
        });
    }

    form.addEventListener("submit", regForm);
}