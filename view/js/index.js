function seeingPassword() {
    var eye = document.getElementById("seePass");
    var not_eye = document.getElementById("not-seePass");
    let pass = document.querySelector("#pass");

    if (pass.type == "password") {
        eye.style.opacity = "0";
        not_eye.style.opacity = "1";
        pass.type = "text";
    } else if (pass.type == "text"){
        eye.style.opacity = "1";
        not_eye.style.opacity = "0";
        pass.type = "password";
    }
}