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

// let user = document.querySelector('#user');
// $('#login-user').on('click',function(){
//     if (user.value == 0 || pass.value == 0) {
//         alert('Por favor, rellene los campos')
//     } else {
//         alert('funca');
//         $.ajax({
//             url: 'model/login2.php',
//             type: 'POST',
//             data: {
//                 user: user.value,
//                 pass: pass.value
//             },
//         })
//     }
// })