/**
 * Created by Adrian on 10/10/2016.
 */


function clientFormValidation() {
    var name = document.getElementById("clientNameId");
    var address = document.getElementById("clientAddressId");
    var date = document.getElementById("example1");
    var balance = document.getElementById("clientBalanceId");
    var phone = document.getElementById("clientPhoneId");
    var status = document.getElementById("clientStatusId");
    var saler = document.getElementById("clientSalerId");
    console.log(phone);

    var colectErrors = '<h4>Existen campos incorrrectos</h4>.<div class="text-danger text-left"><ul>';
    var result = true;

    if(name.value===''){
        colectErrors+= '<li>Nombre y Apellidos</li>';
        result = false;
    }
    if(address.value===''){
        colectErrors+= '<li>Direcci&oacuten</li>';
        result = false;
    }
    // var phoneRX = /^\+?([0-9]{2})\)?[-.]?([0-9]{4})[-.]?([0-9]{4})$/;
    // if(!(phone.value.match(phoneRX))){
    //     colectErrors+= '<li>Tel&eacutefono</li>';
    //     result = false;
    // }
    if(date.value===''){
        colectErrors+= '<li>Fecha</li>';
        result = false;
    }
    if(balance.value===''){
        colectErrors+= '<li>Balance</li>';
        result = false;
    }
    if(status.value==-1){
         colectErrors+= '<li>Estatus</li>';
         result = false;
    }
    if(saler.value== -1){
        colectErrors+= '<li>Vendedor</li>';
        result = false;
    }
    colectErrors+= '</ul></div>';

    if(result){
        swal("Correcto!", "Cliente registrado!", "success");
    }
    else{
        // sweetAlert("Error...", colectErrors, "error");
        swal({
            title: "Error...",
            text: colectErrors,
            type: "error",
            html: true
        });
    }
    return true;
}

function documentFormValidation() {
    var name = document.getElementById("documentNameId");
    var type = document.getElementById("documentTypeId");
    var secuence = document.getElementById("documentSecuenceId");
    var origin = document.getElementById("documentOriginId");
    var status = document.getElementById("documentStatusId");

    var colectErrors = '<h4>Existen campos incorrrectos</h4>.<div class="text-danger text-left"><ul>';
    var result = true;

    if(name.value===''){
        colectErrors+= '<li>Nombre</li>';
        result = false;
    }
    if(type.value==-1){
        colectErrors+= '<li>Documento</li>';
        result = false;
    }
    if(secuence.value===''){
        colectErrors+= '<li>Secuencia</li>';
        result = false;
    }
    if(origin.value==-1){
        colectErrors+= '<li>Origen</li>';
        result = false;
    }
    if(status.value==-1){
        colectErrors+= '<li>Estatus</li>';
        result = false;
    }


    colectErrors+= '</ul></div>';

    if(result){
        swal("Correcto!", "Documento registrado!", "success");
    }
    else{
        // sweetAlert("Error...", colectErrors, "error");
        swal({
            title: "Error...",
            text: colectErrors,
            type: "error",
            html: true
        });
    }
    return result;
}

function salerFormValidation() {
    var saler = document.getElementById("salerNameId");

    var colectErrors = '<h4>Existen campos incorrrectos</h4>.<div class="text-danger text-left"><ul>';
    var result = true;

    if(saler.value===''){
        colectErrors+= '<li>Nombre</li>';
        result = false;
    }
    colectErrors+= '</ul></div>';

    if(result){
        swal("Correcto!", "Vendedor registrado!", "success");
    }
    else{
        // sweetAlert("Error...", colectErrors, "error");
        swal({
            title: "Error...",
            text: colectErrors,
            type: "error",
            html: true
        });
    }
    return result;

}

function countsFormValidation() {
    var doc = document.getElementById("countsDocumentId");
    var status = document.getElementById("countsStatusId");
    var client = document.getElementById("countsClientId");
    var origin = document.getElementById("countsOriginId");

    var days = document.getElementById("countsDaysId");
    var value = document.getElementById("countsValueId");
    var number = document.getElementById("countsNumberId");
    var date = document.getElementById("example1");

    var colectErrors = '<h4>Existen campos incorrrectos</h4>.<div class="text-danger text-left"><ul>';
    var result = true;

    if(doc.value==-1){
        colectErrors+= '<li>Documento</li>';
        result = false;
    }
    if(status.value==-1){
        colectErrors+= '<li>Estatus</li>';
        result = false;
    }
    if(client.value==-1){
        colectErrors+= '<li>Cliente</li>';
        result = false;
    }
    if(origin.value==-1){
        colectErrors+= '<li>Origen</li>';
        result = false;
    }
    if(days.value===''){
        colectErrors+= '<li>D&iacuteas</li>';
        result = false;
    }
    if(value.value===''){
        colectErrors+= '<li>Valor</li>';
        result = false;
    }
    if(number.value===''){
        colectErrors+= '<li>N&uacutemero</li>';
        result = false;
    }
    if(date.value===''){
        colectErrors+= '<li>Fecha</li>';
        result = false;
    }
    colectErrors+= '</ul></div>';

    if(result){
        swal("Correcto!", "Cuenta registrada!", "success");
    }
    else{
        // sweetAlert("Error...", colectErrors, "error");
        swal({
            title: "Error...",
            text: colectErrors,
            type: "error",
            html: true
        });
    }
    return result;
}

function userFormValidation() {
    var name = document.getElementById("userNameId");
    var pass1 = document.getElementById("userPwdId");
    var pass2 = document.getElementById("userRepeatPwdId");
    var status = document.getElementById("userStatusId");
    var privileges = document.getElementById("userPrivilegesId");

    var colectErrors = '<h4>Existen campos incorrrectos</h4>.<div class="text-danger text-left"><ul>';
    var result = true;

    if(name.value===''){
        colectErrors+= '<li>Usuario</li>';
        result = false;
    }

    if(pass1.value===''){
        colectErrors+= '<li>Contrase&ntilde;a</li>';
        result = false;
    }

    if(pass2.value===''){
        colectErrors+= '<li>Repetir Contrase&ntilde;a</li>';
        result = false;
    }

    if(status.value==-1){
        colectErrors+= '<li>Estatus</li>';
        result = false;
    }

    if(privileges.value==-1){
        colectErrors+= '<li>Permisos</li>';
        result = false;
    }

    if(pass1.value != pass2.value){
        colectErrors+= '<li>Las contrase&ntilde;as no son iguales</li>';
        result = false;
    }

    colectErrors+= '</ul></div>';

    if(result){
        swal("Correcto!", "Vendedor registrado!", "success");
    }
    else{
        // sweetAlert("Error...", colectErrors, "error");
        swal({
            title: "Error...",
            text: colectErrors,
            type: "error",
            html: true
        });
    }
    return result;
}


