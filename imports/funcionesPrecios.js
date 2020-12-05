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
function todosProductos(){
  fetch('./includes/datos.php')
  .then(response => {if(!response.ok){
      console.log('error'); throw response.statusText;
      }else return response.json();})
  .then(json => auxiliar(json));
}
(function(){
  fetch('./includes/datos.php')
  .then(response => {if(!response.ok){
      console.log('error'); throw response.statusText;
      }else return response.json();})
  .then(json => auxiliar(json));
})()