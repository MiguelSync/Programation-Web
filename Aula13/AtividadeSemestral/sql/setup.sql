CREATE TABLE TBSETOR (
    SETCODIGO SERIAL PRIMARY KEY,
    SETNOME VARCHAR(100) NOT NULL
);

CREATE TABLE TBPERGUNTA(
	PERCODIGO SERIAL NOT NULL,
	SETCODIGO INT NOT NULL,
	PERTEXTO TEXT NOT NULL,
	PERSTATUS VARCHAR(10) CHECK (PERSTATUS IN ('ATIVO', 'INATIVO')),
	PRIMARY KEY (PERCODIGO)
);

ALTER TABLE TBPERGUNTA ADD CONSTRAINT "FK_TBPERGUNTA_TBSETOR" FOREIGN KEY (SETCODIGO) REFERENCES TBSETOR(SETCODIGO);

CREATE TABLE TBDISPOSITIVO(
	DISCODIGO SERIAL NOT NULL,
	DISNOME VARCHAR(100) NOT NULL,
	DISSTATUS VARCHAR(10) CHECK (DISSTATUS IN ('ATIVO', 'INATIVO')),
	SETCODIGO INT not null,
	PRIMARY KEY (DISCODIGO)
);

ALTER TABLE TBDISPOSITIVO ADD CONSTRAINT "FK_TBDISPOSITIVO_TBSETOR" FOREIGN KEY (SETCODIGO) REFERENCES TBSETOR(SETCODIGO);

-- Tabela de avaliações (uma linha por avaliação)
CREATE TABLE TBAVALIACAO(
	AVACODIGO SERIAL NOT NULL,
	AVAFEEDBACK VARCHAR(300) NULL,
	AVADATAHORA TIMESTAMP NOT NULL,
	SETCODIGO INT NOT NULL,
	DISCODIGO INT NOT NULL,
	PRIMARY KEY (AVACODIGO)
);

ALTER TABLE TBAVALIACAO ADD CONSTRAINT "FK_TBAVALIACAO_TBSETOR" FOREIGN KEY (SETCODIGO) REFERENCES TBSETOR(SETCODIGO);
ALTER TABLE TBAVALIACAO ADD CONSTRAINT "FK_TBAVALIACAO_TBDISPOSITIVO" FOREIGN KEY (DISCODIGO) REFERENCES TBDISPOSITIVO(DISCODIGO);

CREATE TABLE TBRESPOSTA (
	RESCODIGO SERIAL NOT NULL,
	AVACODIGO INT NOT NULL,
	RESRESPOSTA INT CHECK (RESRESPOSTA BETWEEN 0 AND 10) NOT NULL,
	PERCODIGO INT NOT NULL,
	PRIMARY KEY (RESCODIGO, AVACODIGO)
);

ALTER TABLE TBRESPOSTA ADD CONSTRAINT "FK_TBRESPOSTA_TBAVALIACAO" FOREIGN KEY (AVACODIGO) REFERENCES TBAVALIACAO(AVACODIGO);
ALTER TABLE TBRESPOSTA ADD CONSTRAINT "FK_TBRESPOSTA_TBPERGUNTA" FOREIGN KEY (PERCODIGO) REFERENCES TBPERGUNTA(PERCODIGO);

-- Nome de setores
INSERT INTO TBSETOR (SETNOME) VALUES
('Estacionamento'),
('Professores'),
('Recepção'),
('Salas de Aula');

-- Pergunta para cada setor
INSERT INTO TBPERGUNTA (SETCODIGO, PERTEXTO, PERSTATUS) VALUES
-- SETOR 1: ESTACIONAMENTO
(1, 'O estacionamento da Unidavi é de fácil acesso e bem sinalizado?', 'ATIVO'),
(1, 'Você encontra vagas disponíveis com facilidade nos horários de pico?', 'ATIVO'),
(1, 'O local transmite segurança para deixar seu veículo?', 'ATIVO'),
(1, 'A limpeza e organização do estacionamento estão adequadas?', 'ATIVO'),
(1, 'O atendimento dos funcionários responsáveis pelo estacionamento é satisfatório?', 'ATIVO'),

-- SETOR 2: PROFESSORES
(2, 'Os professores demonstram domínio do conteúdo ministrado?', 'ATIVO'),
(2, 'As aulas são bem preparadas e seguem um bom ritmo de aprendizado?', 'ATIVO'),
(2, 'Os professores são acessíveis para tirar dúvidas e orientar os alunos?', 'ATIVO'),
(2, 'As avaliações refletem o conteúdo ensinado em aula?', 'ATIVO'),
(2, 'Os professores incentivam a participação e o pensamento crítico?', 'ATIVO'),

-- SETOR 3: RECEPÇÃO
(3, 'O atendimento na recepção foi cordial e eficiente?', 'ATIVO'),
(3, 'Os atendentes demonstraram disponibilidade para ajudar nas suas dúvidas?', 'ATIVO'),
(3, 'O tempo de espera para ser atendido foi adequado?', 'ATIVO'),
(3, 'As informações fornecidas pela recepção foram claras e completas?', 'ATIVO'),
(3, 'O ambiente da recepção é limpo, organizado e confortável?', 'ATIVO'),

-- SETOR 4: SALAS DE AULA
(4, 'As salas de aula estão limpas e bem conservadas?', 'ATIVO'),
(4, 'A iluminação e ventilação nas salas são adequadas?', 'ATIVO'),
(4, 'Os recursos audiovisuais (projetores, som, etc.) funcionam corretamente?', 'ATIVO'),
(4, 'O mobiliário (cadeiras, mesas, quadro) está em bom estado de uso?', 'ATIVO'),
(4, 'O tamanho das salas é adequado para a quantidade de alunos?', 'ATIVO');

