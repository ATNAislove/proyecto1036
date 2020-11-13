function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);   

    img.onload	=	function()	{
        ctx.drawImage(img, 10,20,300,200);
    }
}

//Funciones de validación

//Función de validación: Inicio Sesión
function validarFormularioAutentificar(){
    nombreUsuario = document.getElementById("username").value;
    console.log(nombreUsuario);
    contasenya = document.getElementById("passwd").value;
    if(nombreUsuario == null || nombreUsuario.length == 0 || /^\s+$/.test(nombreUsuario)){
        return false;
    }
    else if(contasenya == null || contasenya.length == 0 || /^\s+$/.test(contasenya)){
        return false;
    }
}