function seeingPassword() {
    var eye = document.getElementById("seePass");
    var not_eye = document.getElementById("not-seePass");
    var password = document.getElementById("pass");

    if (password.type == "password") {
        eye.style.opacity = "0";
        not_eye.style.opacity = "1";
        password.type = "text";
    } else if (password.type == "text"){
        eye.style.opacity = "1";
        not_eye.style.opacity = "0";
        password.type = "password";
    }
}
