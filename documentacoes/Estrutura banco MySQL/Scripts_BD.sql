CREATE DATABASE CONTRATOS;

USE CONTRATOS;

CREATE TABLE IF NOT EXISTS USUARIOS 		(CD_USUARIO VARCHAR(30) NOT NULL
											,NM_USUARIO VARCHAR(40) NOT NULL
											,DS_OBSERVACAO VARCHAR(2000)
											,CD_SENHA VARCHAR(30) NOT NULL
											,SN_SENHA_PLOGIN VARCHAR(1) DEFAULT 'S'
											,PRIMARY KEY (CD_USUARIO)
)ENGINE = INNODB;

INSERT INTO USUARIOS VALUES ('1','TESTE','','1','S');

SELECT * FROM USUARIOS;


