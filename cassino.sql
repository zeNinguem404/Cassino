
CREATE DATABASE cassino;
USE cassino;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  senha VARCHAR(255),
  saldo DECIMAL(10,2) DEFAULT 100.00
);

CREATE TABLE apostas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  tipo_aposta VARCHAR(50),
  valor_apostado DECIMAL(10,2),
  resultado VARCHAR(50),
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
