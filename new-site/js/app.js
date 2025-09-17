
const playButton = document.querySelector(".iniciar");
const tabuleiro2x2 = document.getElementById("2x2");
const tabuleiro4x4 = document.getElementById("4x4");
const tabuleiro6x6 = document.getElementById("6x6");
const tabuleiro8x8 = document.getElementById("8x8");
const board = document.querySelector(".board"); 
const modoTitulo = document.querySelector(".modo h2"); 



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
  for (let i = 0; i < totalDeCartas; i++) {
    const card = document.createElement("div");
    card.classList.add("card");
    board.appendChild(card);
  }
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

