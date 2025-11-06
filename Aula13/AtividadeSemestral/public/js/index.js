fetch('perguntas.php')
  .then(response => response.json())
  .then(perguntas => {
    console.log(perguntas); // todas as perguntas vindas do banco

    // Exemplo: mostrar na tela
    const container = document.getElementById('lista-perguntas');
    perguntas.forEach(p => {
      const div = document.createElement('div');
      div.textContent = p.perpergunta; // nome da coluna
      container.appendChild(div);
    });
  })
  .catch(err => console.error('Erro ao buscar perguntas:', err));
