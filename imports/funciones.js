function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);   

    img.onload	=	function()	{
        ctx.drawImage(img, 10,20,300,200);
    }
    if(e.target.files[0].size > 2000000){
      document.getElementById("botonImg").disabled = true;
    }else{
      document.getElementById("botonImg").disabled = false;
    }
}

//Funciones de validación

//Función de validación: Formulario del producto
//Precio
function validarPrecio(){
// Coger el texto de la tarea
  let nodo = document.getElementById('precio')
  let precio = nodo.value

  //Comprobar que sea un número positivo >0
  if (precio <= 0)
    /*Cambiar de color a rojo*/
    //Colorear el border color
    nodo.style.color = 'red'
  else
    /*Cambiar el color a verde*/
    nodo.style.color = 'green'
}

function validarCorreo(){
  let nodo = document.getElementById('email')
  let correoE = nodo.value
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (regex.test(correoE)){
    nodo.style.color = 'green'
  }else{
    nodo.style.color = 'red'
  }
}

function validar(){
  // Coger el texto de la tarea
 let nodo = document.getElementById('co')
 let text = nodo.value

 if (text.length < 5)
   /*Cambiar de color a rojo*/
   //Colorear el border color
   nodo.style.color = 'red'
 else
   /*Cambiar el color a verde*/
   nodo.style.color = 'green'
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
function borrarCesta(){
  localStorage.removeItem('cesta');
}

//console.log('hola') para depurar por consola, por defecto no es null sino undefined

//Función para guardar los datos
function guardarDatosForm(){
  //Habrá que guardar en localStorege el nombre, precio y descripcion
  let nombre_product = document.getElementById('nombre_product').value;
  if(nombre_product != null)
    localStorage.setItem('nombre_product', nombre_product);

  console.log(nombre_product);
  let precio = document.getElementById('precio').value;
  if(precio != null)
    localStorage.setItem('precio', precio);

  let descripcion = document.getElementById('descripcion').value;
  if(descripcion != null)
    localStorage.setItem('descripcion', descripcion);

}


/*function recuperarDatosForm(){
  if(window.location.href.includes('upload')){ //Estamos en la página correcta
    document.getElementById('nombre_product').value = localStorage.getItem('nombre_product');
    document.getElementById('precio').value = localStorage.getItem('precio');
    document.getElementById('descripcion').value = localStorage.getItem('descripcion');

    console.log(document.getElementById('descripcion').value);
  }
  console.log(document.getElementById('nombre_product').value);
}*/
//Funcion para recuperar los datos
(function(){
  if(window.location.href.includes('upload')){ //Estamos en la página correcta
    document.getElementById('nombre_product').value = localStorage.getItem('nombre_product');
    document.getElementById('precio').value = localStorage.getItem('precio');
    document.getElementById('descripcion').value = localStorage.getItem('descripcion');

    console.log(document.getElementById('descripcion').value);
  }
  console.log(document.getElementById('nombre_product').value);
})()