//Funcion borrar producto de la cesta
function eliminarNodo(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    if(lista && lista.length>0){
        //Borrar un objeto concreto del array:
        for (var i=0; i<lista.length; i++){
            if (lista[i] == this.parentNode.textContent.slice(0,-6)) {
            lista.splice(i,1);
            }
        }
    //actualizamos localStorage
    localStorage.setItem('cesta',JSON.stringify(lista));
    }
  this.parentNode.remove();
  //hay que borrar de localStorage
}
function productos(){
    let lista = JSON.parse(localStorage.getItem('cesta'));
    return lista.toString();
}

function mostrar(producto){
  let nodo = document.createElement('li');
  if(producto!="")
    nodo.textContent = producto;
  else /*si el contenido es vacio return */
    return; 
    //nodo.textContent = document.getElementById('producto').value;
  
  let nodo2 = document.createElement('button');
  nodo2.textContent = 'Borrar';
  nodo.appendChild(nodo2);
  nodo2.onclick = eliminarNodo.bind(nodo2);
  //borra igual sin el bind
  document.getElementById('compra').appendChild(nodo);    
}
//Muestra los elementos que hay en la cesta
(function(){
    
  let lista = JSON.parse(localStorage.getItem('cesta'));
  if(lista && lista.length>0){
      lista.forEach(producto => mostrar(producto))
  }
})()