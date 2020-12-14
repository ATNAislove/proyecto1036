//Funciones productos

function items(element){
    if (element=="" || element==null) return;
   /*console.log('aqui llega');
    console.log(element);
    console.log(element.produc_id);*/
    let item = document.createElement('ons-carousel-item');

    let nodo = document.createElement('div');
    nodo.className = 'item-label';
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
    item.appendChild(nodo);
    let carrousel = document.getElementById('carr');
    carrousel.appendChild(item);
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

//el fetch sirve para insertar las opciones del buscador
//y ademas mostramos todos los productos en el carrousel
(function(){

fetch('../includes/datos.php')
.then(response => {if(!response.ok){
    console.log('error'); throw response.statusText;
    }else return response.json();})
.then(json => {auxiliar(json);
              insertarOpciones(json);})
.catch(err => console.log(err));
})()


