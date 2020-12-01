function items(element){
    if (element=="" || element==null) return;
    console.log('aqui llega');
    console.log(element);
    console.log(element.produc_id);
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
  
  //para cada producto diccionario llama a la funcion items
  function auxiliar(json){
    for(let producto of json){
        items(producto);
    }
  }

(function(){
    fetch('./includes/precios.php')
    .then(response => {if(!response.ok){
        console.log('error'); throw response.statusText;
        }else return response.json();})
    .then(json => auxiliar(json));
    
})()