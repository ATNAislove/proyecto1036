//Funcion borrar producto de la cesta
function eliminarNodo(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    if(lista && lista.length>0){
        //Borrar un objeto concreto del array:
        for (var i=0; i<lista.length; i++){
          var elemento = parseInt(lista[i]);
          var elementoABorrar = parseInt(this.parentNode.textContent.slice(0,-6));
          console.log(elemento == elementoABorrar);
          console.log(elemento);
          console.log(elementoABorrar);
            if (elemento == elementoABorrar) {
              lista.splice(i,1);
              console.log(lista);
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
  let cadena = "";
  if(lista && lista.length>0){
    cadena=lista[0].toString();
    for (let i=1; i<lista.length;i++){
      cadena = cadena.concat("-" + lista[i]);
    }
  }return cadena;
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
function vaciarLista(){
  let li = document.getElementById('compra');
  let padre = li.parentNode;
  li.remove();
  li= document.createElement('ons-list');
  li.className = 'list list--noborder';
  li.id = 'compra';
  li.style='text-align:center';
  padre.insertBefore(li,padre.firstChild);
  //problemas de concurrencia cambiar todo el codigo y buscar solucion
  /*let li = document.getElementById('compra').childNodes;
  for(let elem of li){
    console.log(elem);
    elem.remove();
    console.log('me ejecuto');
  }
  console.log(li);
  li = document.getElementById('compra');
  if(li.firstChild){
    console.log('existe');
    li.firstChild.remove();

  }
  
  console.log(li);
  console.log('hey');
  */
  /*for( let i=0; i<=li.length+1;i++){
    li[i].remove();
    console.log('me ejecuto')
  }*/
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