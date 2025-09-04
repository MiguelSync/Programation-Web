let username = document.getElementById('user');
let password = document.getElementById('pass');
function clickButton() {
    if (username.value == 'user' && password.value == 'pass') {
        alert('Login OK!');
    }
}