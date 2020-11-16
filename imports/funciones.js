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
  contasenya = document.getElementById("passwd").value;
  
//document.fvalida.nombre.value.length==0

  if (nombreUsuario == null || nombreUsuario.length == 0 || /^\s+$/.test(nombreUsuario)){
      alert("Tiene que escribir su nombre");
      return false;
  }    

  else if(contasenya == null || contasenya.length == 0 || /^\s+$/.test(contasenya)){
      alert("Tiene que escribir una contraseña");
      return false;
  }else if(nombreUsuario != null){
      alert("El usuario no existe");
      return false;
  }
}

//Función añadir elementos a la cesta
function anyadir(producto){
  let lista = JSON.parse(localStorage.getItem('cesta'));
  if(producto=="") return;
  if(lista==null)
    lista = new Array(producto.toString());
  else
      lista.push(producto.toString());
  //actualizamos localStorage
  localStorage.setItem('cesta',JSON.stringify(lista));
}


//console.log('hola') para depurar por consola, por defecto no es null sino undefined
