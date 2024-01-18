const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const phoneNumberInput = form.querySelector('input[name="phoneNumber"]');
function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function isPhoneNumber(phoneNumber) {
    return /^\d{9,15}$/.test(phoneNumber);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
        console.log('email event');
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePhoneNumber() {
    setTimeout(function () {
            markValidation(phoneNumberInput, isPhoneNumber(phoneNumberInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
phoneNumberInput.addEventListener('keyup', validatePhoneNumber);
confirmedPasswordInput.addEventListener('keyup', validatePassword);