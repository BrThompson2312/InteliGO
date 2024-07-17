document.addEventListener("DOMContentLoaded", function() {
    let pass = document.querySelector("#pass");
    let eye = document.querySelector("#eye");
    eye.addEventListener("click", function() {
        if (pass.type == "password") {
            pass.type = "text";
            return eye.name = "eye-off"; 
        }
        pass.type = "password";
        return eye.name = "eye"
    })

    let cedula = document.querySelector('#cedula');
    document.querySelector("#btnLogin").onclick = function(e){
        e.preventDefault()
    
        if (cedula.value !== "" && pass.value !== ""){
            fetch('model/conf_page/login.php', { method: 'POST', body: JSON.stringify({ cedula: cedula.value, pass: pass.value }) })
            .then(res => res.json())
            .then(res => {
                window.location.href = 'menu.php'; 
            })
            .catch(rej => alertSuccess('wrongLogin'))
        } else alertSuccess('incompleted')
    }
})