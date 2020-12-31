const patterns = {
    userName: /^[a-z]{5,12}$/i,
    password: /^[a-z0-9@-]{8,100}$/i,
    email: /^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/
};


function validate(field) {
    if (patterns[field.name].test(field.value)) {
        field.className = 'valid form-control';
    } else {
        field.className = 'invalid form-control';
    }
}

function checkPass(field) {
    if (field.value == document.getElementById("password").value) {
        field.className = 'valid form-control';
    } else {
        field.className = 'invalid form-control';
    }
}


function validateF() {
    if (
        patterns['password'].test(document.getElementById("password").value) &&
        patterns['email'].test(document.getElementById("email").value)) {
        return true;
    } else {
        return false;
    }
}