CREATE DATABASE IF NOT EXISTS agencia;
USE agencia;

CREATE TABLE IF NOT EXISTS destinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    pais VARCHAR(100),
    cidade VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150),
    telefone VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS pacotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destino_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao TEXT,
    FOREIGN KEY (destino_id) REFERENCES destinos(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    pacote_id INT NOT NULL,
    data_contratacao DATE NOT NULL,
    preco_pago DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (pacote_id) REFERENCES pacotes(id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin') DEFAULT 'admin'
);