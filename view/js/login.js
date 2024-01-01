let pass = document.querySelector("#pass");
function seeingPassword() {
    var eye = document.getElementById("seePass");
    var not_eye = document.getElementById("not-seePass");
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

let cedula = document.querySelector('#cedula');
let login_user = document.querySelector("#login-user");
    login_user.onclick = function(event){
        event.preventDefault()
        if (cedula.value == '' || pass.value == ''){
            alertSuccess('incompleted');
        } else {
            $.ajax({
                url: 'model/conf_page/login.php',
                type: 'POST',
                data: {
                    cedula: cedula.value,
                    pass: pass.value
                }, success: function(response){
                   if (response == true){
                        window.location.href = 'menu.php';
                   } else {
                       alertSuccess('wrongLogin');
                   }
                }
            })
        }
    }