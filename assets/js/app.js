function validarFormulario(){
    let inputs=document.querySelectorAll("input[required]");
    for(let i of inputs){
        if(i.value===""){
            alert("Completa todos los campos");
            return false;
        }
    }
    return true;
}