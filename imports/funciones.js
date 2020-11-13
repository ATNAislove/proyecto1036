function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);   

    img.onload	=	function()	{
        ctx.drawImage(img, 10,20,300,200);
    }
}//console.log('hola') para depurar por consola, por defecto no es null sino undefined
