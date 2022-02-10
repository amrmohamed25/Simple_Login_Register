const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#Password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

const toggleConfirm = document.querySelector('#toggleConfirm');
const confirm = document.querySelector('#Confirm');

toggleConfirm.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = confirm.getAttribute('type') === 'password' ? 'text' : 'password';
    confirm.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

function validateRegisterForm() {
    var fields = ["Name", "Email", "Password", "Confirm"];
    var n = fields.length;
    var password;
    var confirm;
    var errors = [];
    for (var i = 0; i < n; i++) {
        var fieldname = fields[i];
        if (document.forms["myForm"][fieldname].value == "") {
            if (fieldname == "Confirm") {
                fieldname = "Confirm Password";
            }
            errors.push(fieldname);
        }
    }

    if (errors.length) {
        if (document.forms["myForm"]["Password"].value == document.forms["myForm"]["Confirm"].value) {
            alert(errors.join() + " must be filled out\n");
            return false;
        }
        else {
            alert(errors.join() + " must be filled out\nPassword and Confirm password aren't the same");
            return false;
        }
    }
    else {
        if (document.forms["myForm"]["Password"].value != document.forms["myForm"]["Confirm"].value) {
            alert("Password and Confirm password aren't the same");
            return false;
        }
    }
}