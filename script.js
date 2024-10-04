let beatPedido = new Audio('audios/Pedido.mp3');
let beatBurguer = new Audio('audios/x-burguer.mp3');
let beatBacon = new Audio('audios/x-bacon.mp3');
let beatFrango = new Audio('audios/x-frango.mp3');
let beatTudo = new Audio('audios/x-tudo.mp3');
let beatConfirmacao = new Audio('audios/confirmacao.mp3');
var fase = 1;

    document.addEventListener('keydown', function(event) {
    const keyName = event.key;

    if (keyName === 'j') {
        if (fase === 1) {
            beatPedido.play(); 
        } else if (fase === 2) {
            beatBurguer.play(); 
        } else if (fase === 3) {
            beatBacon.play(); 
        } else if (fase === 4) {
            beatFrango.play(); 
        } else if (fase === 5) {
            beatTudo.play(); 
        }
    } else if (keyName === 'g') {
        if (fase === 1) {
            beatBurguer.play(); 
            fase = 2;
        } else if (fase === 2) {
            beatBacon.play(); 
            fase = 3;
        } else if (fase === 3) {
            beatFrango.play(); 
            fase = 4;
        } else if (fase === 4) {
            beatTudo.play();
            fase = 5;
        }
    } else if (keyName === 'a') {
        if (fase === 2 || fase === 3 || fase === 4 || fase === 5) {
            beatConfirmacao.play(); 
            fase++;
        }
    }
});






    
   

