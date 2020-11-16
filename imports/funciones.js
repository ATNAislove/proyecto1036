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
//Función añadir elementos a la cesta
function anyadir(producto){
    let nodo = document.createElement('tr');
    if(producto)
      nodo.textContent = producto;
    else /*si el contenido es vacio return */
       nodo.textContent = document.getElementById('producto').value;
    
    let nodo2 = document.createElement('button');
    nodo2.textContent = 'Borrar';
    nodo.appendChild(nodo2);
    nodo2.onclick = eliminarNodo.bind(nodo2);
    //borra igual sin el bind
    document.getElementById('compra').appendChild(nodo);
  }
  //Funcion borrar producto de la cesta
  function eliminarNodo(){
    this.parentNode.remove();
    //hay que borrar de localStorage
  }
  //Funcion guardar elementos de la cesta
  function guardar(){
    let tabla = document.querySelectorAll('tr');
    //hay que conseguir que no guarde el contenido del boton
    tabla = Array.from(tabla).map(n => n.textContent);
    localStorage.setItem('cesta',JSON.stringify(tabla));
  }
  //Muestra los elementos que hay en la cesta
  (function(){
    let tabla = JSON.parse(localStorage.getItem('cesta'));
    if(tabla && tabla.length>0){
        tabla.forEach(producto => anyadir(producto))
    }
  })()


//console.log('hola') para depurar por consola, por defecto no es null sino undefined
