CREATE TABLE setores (
    id_setor SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(100) NOT NULL,
    status VARCHAR(10) CHECK (status IN ('ativo', 'inativo'))
);

CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    status VARCHAR(10) CHECK (status IN ('ativa', 'inativa'))
);

CREATE TABLE avaliacoes (
    id_avaliacao SERIAL PRIMARY KEY,
    id_setor INT REFERENCES setores(id_setor),
    id_pergunta INT REFERENCES perguntas(id_pergunta),
    id_dispositivo INT REFERENCES dispositivos(id_dispositivo),
    resposta INT CHECK (resposta BETWEEN 0 AND 10) NOT NULL,
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE usuarios_admin (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR(10) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
