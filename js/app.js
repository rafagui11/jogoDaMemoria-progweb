// app.js — lógica de configuração / navegação (Parcial 2)

(function () {
  const playButton = document.querySelector(".iniciar");
  const tabuleiro2x2 = document.getElementById("2x2");
  const tabuleiro4x4 = document.getElementById("4x4");
  const tabuleiro6x6 = document.getElementById("6x6");
  const tabuleiro8x8 = document.getElementById("8x8");

  if (!playButton) return;

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

    const modoSelecionado = document.querySelector('input[name="modo"]:checked');
    const modo = modoSelecionado ? modoSelecionado.value : 'classica';

    localStorage.setItem("tabuleiro", JSON.stringify({ linhas, colunas }));
    localStorage.setItem("modo_partida", modo);

    const nomeInput = document.querySelector('#username');
    if (nomeInput && nomeInput.value.trim()) {
      localStorage.setItem('memoria_username', nomeInput.value.trim());
    }

    window.location.href = "game.php";
  });
})();