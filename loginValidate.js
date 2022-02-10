const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#Password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

function validateLoginForm() {
    var fields = ["Email", "Password"];
    var n = fields.length;
    var errors = [];
    for (var i = 0; i < n; i++) {
        var fieldname = fields[i];
        if (document.forms["myForm"][fieldname].value == "") {
            errors.push(fieldname);
        }
    }
    if (errors.length) {
        alert(errors.join() + " must be filled out");
        return false;
    }
}