//Funcion borrar producto de la cesta
function eliminarNodo(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    if(lista && lista.length>0){
        //Borrar un objeto concreto del array:
        for (var i=0; i<lista.length; i++){
          var elemento = parseInt(lista[i]);
          var elementoABorrar = parseInt(this.parentNode.textContent.slice(0,-6));
            if (elemento == elementoABorrar) {
              lista.splice(i,1);
              break;
            }
        }
    //actualizamos localStorage
    localStorage.setItem('cesta',JSON.stringify(lista));
    console.log(lista);
    }
    this.parentNode.remove();
    //actualizamos el value del input items
    let productes = document.getElementById("items");
    productes.value = productos();
}
function productos(){
  let lista = JSON.parse(localStorage.getItem('cesta'));
  let cadena = [];
  if(lista && lista.length>0){
    //cadena=lista[0].toString();
    for (let i=0; i<lista.length;i++){
      cadena.push(lista[i]);
    }
  }return cadena.join('-');
}
function mostrar(producto){
  let nodo = document.createElement('ons-list-item');
  nodo.className = 'list-item';
  let div = document.createElement('div');
  div.className = 'list-item__center';
  if(producto!=""){
    div.textContent = producto + ' ';
    document.createElement('br');
  }else{ /*si el contenido es vacio return */
    //Crear la alerta indicando que la cesta está vacía
    let alerta = document.createElement('alert');
    alerta = alert('La cesta está vacía');
    alerta.className = 'alert';
    console.log('Hola');
    return; 
    //nodo.textContent = document.getElementById('producto').value;
  }
  let nodo2 = document.createElement('ons-button');
  nodo2.textContent = 'Borrar';
  nodo2.className = 'button';
  div.appendChild(nodo2);
  nodo2.onclick = eliminarNodo.bind(nodo2);
  //borra igual sin el bind
  nodo.appendChild(div);
  document.getElementById('compra').appendChild(nodo);    
}
//borra los elementos guardados en la cesta de localStorage
function vaciarCesta(){
  let lista=[];
  localStorage.setItem('cesta',JSON.stringify(lista));
  vaciarLista();
}
//borramos la lista y la volvemos a crear
function vaciarLista(){
  let li = document.getElementById('compra');
  let padre = li.parentNode;
  li.remove();
  li= document.createElement('ons-list');
  li.className = 'list list--noborder';
  li.id = 'compra';
  li.style='text-align:center';
  padre.insertBefore(li,padre.firstChild);
}
//Muestra los elementos que hay en la cesta
function cesta(){
  console.log('cesta entra')
  console.log(localStorage.getItem('cesta'));
  let lista = JSON.parse(localStorage.getItem('cesta'));
  if(lista && lista.length>0){
      lista.forEach(producto => mostrar(producto));
      //anyadir los productos al valor del input items
      let productes = document.getElementById("items");
      productes.value = productos();
  }
}

//Función que cuente el número de productos
function contarProductos(){
  let lista = JSON.parse(localStorage.getItem('cesta'));
  if(lista && lista.length>0){
    //Colocar el número de elementos
    let numero = lista.length;
    document.createElement('p') = numero;
    return numero;
  }
  //Si no, colocar un 0
  document.createElement('p') = 0;
  return 0;
}
function comprar(){
  let producto = document.getElementById('items').value;
    
  fetch('../mobile/comprar.php?productes=' + producto)
  .then(response => {if(!response.ok){
    console.log('error'); throw response.statusText;
    }else return response.json();})
  .then(json => {console.log(json);
      if(json.resultado == 'KO'){
        document.getElementById('dialog-1').show();
      }
        vaciarCesta();
  });
  
}
var hideAlertDialog = function() {
  document.getElementById('dialog-1').hide();
};