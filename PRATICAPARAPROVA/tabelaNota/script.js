document.addEventListener('DOMContentLoaded', function() {
    const btnMediaColunas = document.getElementById('btnMediaColunas');
    const btnMediaLinhas = document.getElementById('btnMediaLinhas');
    const tabela = document.getElementById('tabelaNotas');
    
    // Função para calcular a média de um array de números
    function calcularMedia(valores) {
        const numeros = valores.map(val => parseFloat(val) || 0);
        const soma = numeros.reduce((acc, val) => acc + val, 0);
        return soma / numeros.length;
    }
    
    // Função para formatar o número com duas casas decimais
    function formatarNumero(num) {
        return Number.isInteger(num) ? num.toString() : num.toFixed(2);
    }
    
    // Adicionar média das colunas (notas)
    btnMediaColunas.addEventListener('click', function() {
        // Verificar se já existe uma linha de média
        if (document.querySelector('.media-coluna')) {
            alert('A média das notas já foi calculada!');
            return;
        }
        
        const tbody = tabela.querySelector('tbody');
        const linhas = tbody.querySelectorAll('tr');
        const numColunas = linhas[0].querySelectorAll('td').length;
        
        // Criar nova linha para as médias
        const novaLinha = document.createElement('tr');
        novaLinha.classList.add('media-coluna');
        
        // Adicionar célula com o título
        const tituloCell = document.createElement('td');
        tituloCell.textContent = 'Média das Notas';
        tituloCell.style.fontWeight = 'bold';
        novaLinha.appendChild(tituloCell);
        
        // Calcular a média para cada coluna de notas
        for (let col = 1; col < numColunas; col++) {
            const valores = [];
            
            // Coletar valores da coluna
            linhas.forEach(linha => {
                const cell = linha.cells[col];
                if (cell && cell.textContent.trim() !== '') {
                    valores.push(cell.textContent);
                }
            });
            
            // Calcular e formatar a média
            const media = calcularMedia(valores);
            const mediaCell = document.createElement('td');
            mediaCell.textContent = formatarNumero(media);
            novaLinha.appendChild(mediaCell);
        }
        
        // Adicionar a linha ao final da tabela
        tbody.appendChild(novaLinha);
        
        // Desabilitar o botão após o uso
        this.disabled = true;
        this.style.backgroundColor = '#95a5a6';
        this.textContent = 'Médias das Notas Calculadas';
    });
    
    // Adicionar média das linhas (alunos)
    btnMediaLinhas.addEventListener('click', function() {
        // Verificar se já existe uma coluna de média
        if (tabela.querySelector('.media-linha')) {
            alert('A média dos alunos já foi calculada!');
            return;
        }
        
        const thead = tabela.querySelector('thead');
        const tbody = tabela.querySelector('tbody');
        const linhas = tbody.querySelectorAll('tr');
        
        // Adicionar cabeçalho para a coluna de média
        const headerRow = thead.querySelector('tr:first-child');
        const mediaHeader = document.createElement('th');
        mediaHeader.textContent = 'Média do Aluno';
        mediaHeader.rowSpan = 2;
        headerRow.appendChild(mediaHeader);
        
        // Adicionar célula vazia na segunda linha do cabeçalho
        const secondHeaderRow = thead.querySelector('tr:last-child');
        const emptyHeader = document.createElement('th');
        emptyHeader.style.display = 'none';
        secondHeaderRow.appendChild(emptyHeader);
        
        // Calcular e adicionar a média para cada aluno
        linhas.forEach(linha => {
            const cells = linha.querySelectorAll('td');
            const valores = [];
            
            // Coletar valores das células de nota (todas exceto a primeira que é o nome)
            for (let i = 1; i < cells.length; i++) {
                if (cells[i].textContent.trim() !== '') {
                    valores.push(cells[i].textContent);
                }
            }
            
            // Calcular e formatar a média
            const media = calcularMedia(valores);
            const mediaCell = document.createElement('td');
            mediaCell.textContent = formatarNumero(media);
            mediaCell.classList.add('media-linha');
            linha.appendChild(mediaCell);
        });
        
        // Se existir linha de média das colunas, adicionar célula vazia nela
        const mediaColunaRow = document.querySelector('.media-coluna');
        if (mediaColunaRow) {
            const emptyCell = document.createElement('td');
            emptyCell.textContent = '-';
            mediaColunaRow.appendChild(emptyCell);
        }
        
        // Desabilitar o botão após o uso
        this.disabled = true;
        this.style.backgroundColor = '#95a5a6';
        this.textContent = 'Médias dos Alunos Calculadas';
    });
});