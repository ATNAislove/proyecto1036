function items(element){
    if (element=="" || element==null) return;
   /*console.log('aqui llega');
    console.log(element);
    console.log(element.produc_id);*/
    let nodo = document.createElement('div');
    nodo.className = 'item';
    nodo.id=element.produc_id;
    let nodo2 = document.createElement('img');
    nodo2.src= element.img;
    nodo2.width="178";
    nodo2.height="178";
    nodo.appendChild(nodo2);
    let nodo3 = document.createElement('p');
    
    nodo3.textContent = element.nombre + ' '+ element.precio + '€';
    nodo.appendChild(nodo3);
    let nodo4=document.createElement('button');
    nodo4.textContent='Añadir a la cesta';
    nodo4.className='button';
    
    nodo4.onclick=anyadir;
    nodo.appendChild(nodo4);
    let carrousel = document.getElementById('carr');
    carrousel.appendChild(nodo);
}





//Función añadir elementos a la cesta
function anyadir(){
  let producto = this.parentNode.id;
  let lista = JSON.parse(localStorage.getItem('cesta'));
  if(producto=="") return;
  if(lista==null)
    lista = new Array(producto.toString());
  else
      lista.push(producto.toString());
  //actualizamos localStorage
  localStorage.setItem('cesta',JSON.stringify(lista));
}
  
  //para cada producto diccionario llama a la funcion items
  function auxiliar(json){
    if(json.length==0 || json == null){
      alert("No hay productos en ese rango de precios");
      return;
    }
    for(let producto of json){
        items(producto);
    }
  }
function vaciarCarrousel(){
  let $carr = document.getElementById('carr');
  while ($carr.firstChild){
    $carr.removeChild($carr.firstChild);
  };
  
}
function preciosFiltrados(){
  $min = document.getElementById('min').value;
  $max = document.getElementById('max').value;
  //vaciamos el carrousel si es que hay algo
    vaciarCarrousel();
    //si no se ha introducido algun valor muestra todos los productos
    if ($min=="" || $max=="") {
      todosProductos();
      return;
    }
    //cogemos el formulario
    let $formulario = document.querySelector('#formulario');
    //lo transformamos en un formData
    let $formData = new FormData($formulario);
    //console.log($formData.get('min'))

    //evitamos que la pagina se recargue
    $formulario.addEventListener('submit', event =>{
      event.preventDefault();
    }) 
    //hacemos un fetch post para que pase los parametros mediante el formData
    // y recogemos el json con los productos filtrados
    fetch('./includes/precios.php',{
      method : 'POST',
      body : $formData
    })
    .then(response => {if(!response.ok){
        console.log('error'); throw response.statusText;
        }else return response.json();})
    .then(json => auxiliar(json));
}
//funcion que recoje todos los productos sin filtros y llama a otras funciones para que los muestren
//si el elemento que busco con el buscador no esta en el carrousel porque hemos filtrado
//habremos llamado a esta funcion para que se muestren todos los productos y asi, con este ultimo then lo muestra en el lado visible del carrousel
function todosProductos(){
  fetch('./includes/datos.php')
  .then(response => {if(!response.ok){
      console.log('error'); throw response.statusText;
      }else return response.json();})
  .then(json => auxiliar(json))
  .then(x => {if(Prod2ID[document.getElementById('buscador').value]) 
  document.getElementById(Prod2ID[document.getElementById('buscador').value]).scrollIntoView();}
  );
}
//inserta las opciones en el buscador
function insertarOpciones(L){
  //si no le ponemos var dentro de una funcion es global
  //para hacerla global si no estas en una funcion es con var
  Prod2ID = {}
  //para cada producto creamos un elemento opcion con el nombre del producto y
  // lo almacenamos con su id en Prod2ID, luego lo añadimos a la pagina
  L.forEach(x => {
    let n = document.createElement('option');
    n.value = x.nombre;
    Prod2ID[x.nombre] = x.produc_id;
    document.getElementById('prendas').appendChild(n);
  })
}
//muestra en pantalla el producto seleccionado en el buscador
function mostrarEnPantalla(){
  let $nombre = document.getElementById('buscador').value;
  if(!Prod2ID[$nombre]) return;
  try{
    document.getElementById(Prod2ID[$nombre]).scrollIntoView();
  }catch(error){
    vaciarCarrousel();
    todosProductos();
    //document.getElementById(Prod2ID[$nombre]).scrollIntoView();
  }
}
//el primer fetch sirve para insertar las opciones del buscador
//con el segundo fetch mostramos todos los productos
(function(){
fetch('./includes/datos.php')
.then(response => response.json())
.then(data => insertarOpciones(data))
.catch(err => console.log(err))

  fetch('./includes/datos.php')
  .then(response => {if(!response.ok){
      console.log('error'); throw response.statusText;
      }else return response.json();})
  .then(json => auxiliar(json));
})()


//Validar precios
function validarPrecioMax(){
  // Coger el texto de la tarea
    let nodo = document.getElementById('max')
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

  function validarPrecioMin(){
    // Coger el texto de la tarea
      let nodo = document.getElementById('min')
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