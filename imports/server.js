fetch('./includes/datos.php')
.then(response => {if(!response.ok){
    console.log('error'); throw response.statusText;
    }else return response.json();})
.then(json => console.log(JSON.stringify(json)))
.catch(err => console.log('Fetch Error: ', err))