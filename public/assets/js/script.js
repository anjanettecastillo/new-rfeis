function showPassword(){
    var frm = document.getElementById('frmPassword');
    var txtHolder = document.getElementById('showPassIcon');

    if(frm.type === "password"){
        frm.type = "text";
        txtHolder.className = "fas fa-eye-slash";
    }else{
        frm.type = "password";
        txtHolder.className = "fas fa-eye";
    }
}
$('.your-checkbox').prop('indeterminate', true)