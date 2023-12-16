const checkSimilarity = () => {
    const email = document.getElementById("email").value;
    const confirmEmail = document.getElementById("confirmEmail").value;
    if (email === confirmEmail) {
        alert("The inputs are the same");
    } else {
        alert("The inputs are not the same");
    }
};

const validate = event => {
    event.preventDefault();
    let errors = "";
    const usernameField = document.getElementById("username").value;
    usernameField === ""
        ? (errors += "Username field is not complete\n")
        : undefined;
    const emailField = document.getElementById("email").value;
    emailField === "" ? (errors += "Email field is not complete\n") : undefined;

    const confirmEmailField = document.getElementById("confirmEmail").value;
    confirmEmailField === ""
        ? (errors += "Confirm email field is not complete\n")
        : undefined;
    const passwordField = document.getElementById("password").value;
    passwordField === ""
        ? (errors += "Password field is not complete\n")
        : undefined;
    const occupationField = document.getElementById("occupation").value;
    occupationField === ""
        ? (errors += "Occupation field is not complete\n")
        : undefined;
    const bioField = document.getElementById("bio").value;
    bioField === "" ? (errors += "Bio field is not complete\n") : undefined;

    const pineappleField = document.querySelectorAll(
        "input[name='pineappleChoice']"
    );
    Object.values(pineappleField)
        .map(val => val.checked)
        .filter(val => val === true).length === 0
        ? (errors += "Pineapple field is not complete\n")
        : undefined;

    const pcField = document.querySelectorAll("input[name='pcUsed']");
    Object.values(pcField)
        .map(val => val.checked)
        .filter(val => val === true).length === 0
        ? (errors += "PC field is not complete\n")
        : undefined;

    const weatherField = document.querySelectorAll("input[name='weather']");
    Object.values(weatherField)
        .map(val => val.checked)
        .filter(val => val === true).length === 0
        ? (errors += "Weather field is not complete\n")
        : undefined;

    alert(errors === "" ? "There are no fields that are incomplete" : errors);
};
