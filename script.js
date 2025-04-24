const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})


function validatePassword(input, msgElement) {
    const value = input.value;
    const messageEl = document.getElementById(msgElement);

    const minLength = value.length >= 8;
    const hasUppercase = /[A-Z]/.test(value);
    const hasLowercase = /[a-z]/.test(value);
    const hasNumber = /[0-9]/.test(value);
    const hasSpecialChar = /[^A-Za-z0-9]/.test(value);

    if (!minLength || !hasUppercase || !hasLowercase || !hasNumber || !hasSpecialChar) {
        messageEl.textContent = "Debe tener 8 caracteres mínimo, Mayúsculas, Minúsculas, Números y Caracteres Especiales";
        messageEl.classList.remove("valid");
    } else {
        messageEl.textContent = "Contraseña segura ✅";
        messageEl.classList.add("valid");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const registerPass = document.getElementById("registerPassword");
    const loginPass = document.getElementById("loginPassword");

    if (registerPass) {
        registerPass.addEventListener("input", function () {
            validatePassword(registerPass, "registerPasswordMsg");
        });
    }

    if (loginPass) {
        loginPass.addEventListener("input", function () {
            validatePassword(loginPass, "loginPasswordMsg");
        });
    }
});


function validateEmail(input, msgElement) {
    const value = input.value;
    const messageEl = document.getElementById(msgElement);

    if (!value.includes("@")) {
        messageEl.textContent = "El correo debe contener el símbolo @";
        messageEl.classList.remove("valid");
    } else {
        messageEl.textContent = "Correo válido ✅";
        messageEl.classList.add("valid");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const registerEmail = document.getElementById("emailRegister");
    const loginEmail = document.getElementById("emailLogin");

    if (registerEmail) {
        registerEmail.addEventListener("input", function () {
            validateEmail(registerEmail, "emailRegisterMsg");
        });
    }

    if (loginEmail) {
        loginEmail.addEventListener("input", function () {
            validateEmail(loginEmail, "emailLoginMsg");
        });
    }
});
