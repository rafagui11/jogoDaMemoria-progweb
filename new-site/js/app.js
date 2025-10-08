
const playButton = document.querySelector(".iniciar");
const tabuleiro2x2 = document.getElementById("2x2");
const tabuleiro4x4 = document.getElementById("4x4");
const tabuleiro6x6 = document.getElementById("6x6");
const tabuleiro8x8 = document.getElementById("8x8");
const board = document.querySelector(".board"); 
const modoTitulo = document.querySelector(".modo h2");
let primeiraCarta = null;
let segundaCarta = null;
let travado = false;
let movimentos = 0;
let timerIntervalo = null;
let segundos = 0;
let paresEncontrados = 0;
let totalDePares = 0;
const arrayCartas = [
  'apple.svg',
  'burguer.svg',
  'carrot.svg',
  'cattle.svg',
  'cherry.svg',
  'chicken.svg',
  'coffe,svg',
  'coffe_drink.svg',
  'coffe_beam.svg',
  'cup.svg',
  'dingos.svg',
  'drink.svg',
  'drink4.svg',
  'egg.svg',
  'garlic.svg',
  'gift.svg',
  'grapes.svg',
  'guava.svg',
  'house.svg',
  'ice_cone.svg',
  'icecream.svg',
  'juice.svg',
  'leaf.svg',
  'pimentao.svg',
  'song.svg',
  'strawberry.svg',
  'sweet.svg',
  'toffe.svg',
  'tomato.svg',
  'wine.svg'
];


function criarTabuleiro(linhas, colunas) {
  if (!board) {
    console.error("Elemento 'board' não encontrado!");
    return;
  }
  board.innerHTML = "";
  if (modoTitulo) {
    modoTitulo.textContent = `${linhas}x${colunas}`;
  }
  board.style.display = "grid";
  board.style.gridTemplateColumns = `repeat(${colunas}, 1fr)`;
  board.style.gridTemplateRows = `repeat(${linhas}, 1fr)`;
  const totalDeCartas = linhas * colunas;
  paresEncontrados = 0;
  totalDePares = totalDeCartas / 2;

  const numerosPares = totalDeCartas / 2;
  const imagensUnicas = [];
  const arrayCopia = [...arrayCartas];
  
  for(let i = 0; i < numerosPares; i++){
    let indiceAleatorio = Math.floor(Math.random() * arrayCopia.length);
    imagensUnicas.push(arrayCopia.splice(indiceAleatorio, 1)[0]);
  }
  const baralhoDePares = [...imagensUnicas, ...imagensUnicas];

  for (let i = baralhoDePares.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [baralhoDePares[i], baralhoDePares[j]] = [baralhoDePares[j], baralhoDePares[i]];
  }


  for (let i = 0; i < totalDeCartas; i++) {
    const card = document.createElement("div");
    card.classList.add("card");
    
    card.setAttribute('data-imagem', baralhoDePares[i]);

 
    const frente = document.createElement('div');
    frente.classList.add('face', 'frente');
    const imagem = document.createElement('img');
    imagem.src = `../img/fruits/${baralhoDePares[i]}`; 
    frente.appendChild(imagem);
    
    const verso = document.createElement('div');
    verso.classList.add('face', 'verso');  
    verso.innerHTML = '<img src="../img/question-mark.png" />';

    card.appendChild(frente);
    card.appendChild(verso);

 
    card.addEventListener('click', virarCarta);
    
    board.appendChild(card);
  }
}

function iniciarTimer() {
  const timerElemento = document.querySelector(".timer");
  timerIntervalo = setInterval(() => {
    segundos++;
    const minutos = Math.floor(segundos / 60);
    const segundosRestantes = segundos % 60;
    
    timerElemento.textContent = 
      `${minutos.toString().padStart(2, '0')}:${segundosRestantes.toString().padStart(2, '0')}`;
  }, 1000); // Atualiza a cada 1 segundo
}

function contarMovimento() {
    movimentos++;
    const contadorElemento = document.querySelector(".tries-count");
    contadorElemento.textContent = `x ${movimentos.toString().padStart(2, '0')}`;
}

function virarCarta() {

  if (!timerIntervalo) {
    iniciarTimer();
  }

  if (travado) return; 
  if (this === primeiraCarta) return; 

  this.classList.add('flipped');

  if (!primeiraCarta) {
    primeiraCarta = this;
    return;
  }

 
  segundaCarta = this;
  contarMovimento();
  checarPar();
}

function checarPar() {
  const ehPar = primeiraCarta.dataset.imagem === segundaCarta.dataset.imagem;

 
  ehPar ? desabilitarCartas() : desvirarCartas();
}

function desabilitarCartas() {
  primeiraCarta.removeEventListener('click', virarCarta);
  segundaCarta.removeEventListener('click', virarCarta);
  paresEncontrados++;
  if (paresEncontrados === totalDePares) {
    clearInterval(timerIntervalo); 
    setTimeout(exibirVitoria, 800); 
  }

  resetarTabuleiro();
}
function desvirarCartas() {
  travado = true;

  setTimeout(() => {
    primeiraCarta.classList.remove('flipped');
    segundaCarta.classList.remove('flipped');
    
    resetarTabuleiro();
  }, 1200); 
}

function resetarTabuleiro() {
  [primeiraCarta, segundaCarta] = [null, null];
  travado = false;
}

function exibirVitoria() {
  const tempoFinal = document.querySelector('.timer').textContent;
  const movimentosFinais = movimentos;

  const modalOverlay = document.createElement('div');
  modalOverlay.className = 'modal-overlay';

  const modalBox = document.createElement('div');
  modalBox.className = 'modal';

  modalBox.innerHTML = `
    <h2>Parabéns!</h2>
    <p>Você venceu o jogo!</p>
    <p><strong>Tempo:</strong> ${tempoFinal}</p>
    <p><strong>Movimentos:</strong> ${movimentosFinais}</p>
    <button id="jogarNovamente">Jogar Novamente</button>
  `;

  modalOverlay.appendChild(modalBox);
  document.body.appendChild(modalOverlay);

  document.getElementById('jogarNovamente').addEventListener('click', () => {
    window.location.href = '../pages/hub_partida.html';
  });
}


if (playButton) {
  playButton.addEventListener("click", () => {
    let linhas = 8, colunas = 8;
    if (tabuleiro2x2 && tabuleiro2x2.checked) {
      linhas = colunas = 2;
    } else if (tabuleiro4x4 && tabuleiro4x4.checked) {
      linhas = colunas = 4;
    } else if (tabuleiro6x6 && tabuleiro6x6.checked) {
      linhas = colunas = 6;
    } else if (tabuleiro8x8 && tabuleiro8x8.checked) {
      linhas = colunas = 8;
    }
    
    localStorage.setItem("tabuleiro", JSON.stringify({ linhas, colunas }));
   
    window.location.href = "game.html";
  });
}

if (window.location.pathname.endsWith("game.html")) {
  let config = { linhas: 8, colunas: 8 }; 
  try {
    const salvo = localStorage.getItem("tabuleiro");
    if (salvo) {
      config = JSON.parse(salvo);
    }
  } catch (e) {}
  criarTabuleiro(config.linhas, config.colunas);
}



// Lógica para os botões
const btnDica = document.querySelector('.btn-orange'); 
const btnTrapaca = document.querySelector('.btn-orange.outlined');

btnTrapaca.addEventListener('click', () => {
    if (travado) return;
    const todasAsCartas = document.querySelectorAll('.card:not(.flipped)');
    travado = true;
    todasAsCartas.forEach(card => card.classList.add('flipped'));

    setTimeout(() => {
        todasAsCartas.forEach(card => card.classList.remove('flipped'));
        travado = false;
    }, 2000); 
});


btnDica.addEventListener('click', () => {
    if (travado) return;
    const cartasNaoViradas = Array.from(document.querySelectorAll('.card:not(.flipped)'));
    let parEncontrado = null;

  
    for (let i = 0; i < cartasNaoViradas.length; i++) {
        for (let j = i + 1; j < cartasNaoViradas.length; j++) {
            if (cartasNaoViradas[i].dataset.imagem === cartasNaoViradas[j].dataset.imagem) {
                parEncontrado = [cartasNaoViradas[i], cartasNaoViradas[j]];
                break;
            }
        }
        if (parEncontrado) break;
    }

    if (parEncontrado) {
        travado = true;
        parEncontrado.forEach(card => card.classList.add('flipped'));
        setTimeout(() => {
            parEncontrado.forEach(card => card.classList.remove('flipped'));
            travado = false;
        }, 1500); 
    }
});
