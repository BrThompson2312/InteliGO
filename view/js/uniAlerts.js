let alert_success = document.querySelector('#alert-add');
function alertSuccess(type_alert) {

    alert_success.style.display = "block";
    alert_success.className = null;
    
    switch(type_alert){
        case 'success':
            alert_success.classList.add('alert-success');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-check fa-1x"></i> Campos ingresados correctamente';
            break;
        case 'incompleted':
            alert_success.classList.add('alert-info');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-info fa-1x"></i> Campos incompletos';
            break;
        case 'warning':
            alert_success.classList.add('alert-warning');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-triangle-exclamation fa-1x"></i> Campos erroneos';
            break;
        case 'error':
            alert_success.classList.add('alert-danger');
            alert_success.innerHTML = `<i style="margin-right: 12px;" class="fa fa-circle-exclamation fa-1x"></i> Error`;
            break;
        case 'modify':
            alert_success.classList.add('alert-modify');
            alert_success.innerHTML = `<i style="margin-right: 12px;" class="fa fa-pen-to-square fa-1x"></i> Modificado con éxito`;
            break;
        case 'trashed':
            alert_success.classList.add('alert-trashed');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-trash fa-1x"></i> Eliminado exitosamente';
            break;
        case 'asigned':
            alert_success.classList.add('alert-warning');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-triangle-exclamation fa-1x"></i> Chofer no disponible';
            break;
        case 'wrongLogin':
            alert_success.classList.add('alert-danger');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-circle-xmark fa-1x"></i> Error al iniciar sesión';
            break;
    }

    alert_success.style.animation = "alert 0.5s ease";
    alert_success.addEventListener("animationend", function(){
        setTimeout(function () {
            alert_success.style.animation = "des_alert 0.5s ease";
            setTimeout(function () {
                alert_success.style.display = "none";
            }, 500);
        }, 500);
    })
    
}