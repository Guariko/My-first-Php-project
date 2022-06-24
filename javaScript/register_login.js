const userInputs = document.querySelectorAll(".register__login__container input");
const userMinimunCharacterPassword = 8;
const registerButton = document.querySelector(".button:first-of-type")



registerButton.addEventListener("click", e => {
    userInputs.forEach(userInput => {
        if (userInput.getAttribute("type") === "password") {
            userPassword = userInput.value 
            if (userPassword.length < userMinimunCharacterPassword) {
                e.preventDefault();
                
                userInput.nextElementSibling.innerText = "Please, enter at least 8 characters";
                userInput.nextElementSibling.style.setProperty("display", "initial");              
            };
        };

        if (userInput.getAttribute("type") === "email") {
            if (!userInput.value.includes("@")) {
                e.preventDefault();
                userInput.nextElementSibling.innerText = "Please, enter valid email";
                userInput.nextElementSibling.style.setProperty("display", "initial");
            }
        };

        if (userInput.getAttribute("type") === "text") {
            if (userInput.value.length < 2) {
                e.preventDefault();
                userInput.nextElementSibling.innerText = "Please, enter a user name";
                userInput.nextElementSibling.style.setProperty("display", "initial");
            }
        }
    });
});
