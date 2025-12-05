document.addEventListener('DOMContentLoaded', () => {
  const botoes = document.querySelectorAll('.buttons-feedback .button');
  const inputHidden = document.getElementById('avaliacaoHidden'); // input oculto
  let valorSelecionado = null;

  if (!botoes || botoes.length === 0) {
    console.error('Nenhum botão encontrado — verifique a classe .buttons-feedback .button no HTML.');
    return;
  }

  botoes.forEach((botao, index) => {
    botao.dataset.value = index; // para debugging
    botao.addEventListener('click', (e) => {
      botoes.forEach(b => b.classList.remove('ativo', 'selecionado'));
      for (let i = 0; i <= index; i++) {
        botoes[i].classList.add('ativo');
      }
      botoes[index].classList.add('selecionado');

      valorSelecionado = index;
      if (inputHidden) inputHidden.value = valorSelecionado;
    });
  });

  // Função para redefinir o estado dos botões
  window.resetarBotoesAvaliacao = function() {
    botoes.forEach(b => b.classList.remove('ativo', 'selecionado'));
    valorSelecionado = null;
    if (inputHidden) inputHidden.value = "";
  };
});
