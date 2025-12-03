var Avaliacao = {

    questoes: {},
    perguntaAtual: 0,
    respostas: {},

    /** Comportamento realizado ao carregar a tela */
    onLoadAvaliacao: function() {
        Avaliacao.loadScripts();
        Avaliacao.carregaPerguntas();
        Avaliacao.startQuiz();
    },

    /** Carrega os comportamentos iniciais dos componentes */
    loadScripts: function() {
        $('.button').on('click', Avaliacao.onClickButtonAnswer);
        $('#btnEnviar').on('click', Avaliacao.salvaQuestionario);
    },

    /** Carrega as perguntas do formulário */
    carregaPerguntas: function() {
        $.ajax({
            url: 'http://localhost:8000/Aula13/AtividadeSemestral/src/pergunta.php',
            method: 'get',
            async: false
        }).then(function(response) {
            let perguntas = JSON.parse(response);
            Avaliacao.questoes = perguntas;
            Avaliacao.perguntaAtual = parseInt(Object.keys(perguntas)[0]);
        });
    },

    startQuiz: function() {
        Avaliacao.carregaProximaPergunta();
        $('#feedback-final').css('display', 'none'); 
        $('#estrutura-container').css('display', 'flex'); 
    },

    animationBounce: function() {
        const titulo = document.querySelector('.title');
        $('.title').css('animation', 'none'); 
        $('.title')[0].offsetHeight;
        $('.title').css('animation', 'bounceIn 0.6s ease'); 
    },

    carregaProximaPergunta: function() {
        $("#perguntaTexto").fadeOut(200, function() {
            $(this).html(Avaliacao.questoes[Avaliacao.perguntaAtual]);
            $(this).fadeIn(200, function() {
                if (typeof resetarBotoesAvaliacao === 'function') {
                    resetarBotoesAvaliacao();
                }   
            });  
            Avaliacao.animationBounce();
        });
    },

    onClickButtonAnswer: function() {
        Avaliacao.respostas[Avaliacao.perguntaAtual] = this.value;

        if (Avaliacao.perguntaAtual != Object.keys(Avaliacao.questoes).pop()) {
            Avaliacao.perguntaAtual++;
            Avaliacao.carregaProximaPergunta();
        } else {
            setInterval(function() {
                if (typeof resetarBotoesAvaliacao === 'function') {
                    resetarBotoesAvaliacao();
                }
            }, 400);
            setTimeout(function() {
                Avaliacao.exibeFeedback();
            }, 1000);    
        };
    },

    exibeFeedback: function() {
        $('#estrutura-container').css('display', 'none');
        $('#feedback-final').css('display', 'flex'); 
    },

    salvaQuestionario: function() {
        
        Avaliacao.respostas['feedback'] = $('#feedbackTexto')[0].value;
        $.ajax({
            url: 'http://localhost:8000/Aula13/AtividadeSemestral/src/avaliacao.php',
            method: 'post',
            data: JSON.stringify(Avaliacao.respostas),
            contentType: 'application/json; charset=UTF-8'
         }).then((response) => {
            $('#feedback-final').css('display', 'none'); 
            $('.modal-agradecimento').css('display', 'flex'); 
            setTimeout(function() {
                $('.modal-agradecimento').css('display', 'none'); 
                 Avaliacao.reiniciaQuestionario();
            }, 10000);
        });
    },

    reiniciaQuestionario: function() {
        Avaliacao.perguntaAtual = parseInt(Object.keys(Avaliacao.questoes)[0]);
        $('#feedback-final').css('display', 'none'); 
        $('#estrutura-container').css('display', 'flex'); 
    }
}
Avaliacao.onLoadAvaliacao();