sudo docker exec -it id_container bash

mysql -u user -p

SHOW DATABASES;
CREATE DATABASE db_agenda;
DROP DATABASE db_agenda;

SHOW TABLES;
CREATE TABLE tb_clientes (
    id INT  UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    telefone VARCHAR(15) NOT NULL,
    data_cadastro VARCHAR(20) NOT NULL
);

