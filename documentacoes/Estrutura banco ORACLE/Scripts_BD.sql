CREATE TABLE USUARIOS	(CD_USUARIO VARCHAR2(30) NOT NULL
											,NM_USUARIO VARCHAR2(40) NOT NULL
											,DS_OBSERVACAO VARCHAR2(2000)
											,CD_SENHA VARCHAR2(30) NOT NULL
											,SN_SENHA_PLOGIN NUMBER(1,0)
											,PRIMARY KEY (CD_USUARIO)
);

TRUNCATE TABLE USUARIOS;
DROP TABLE USUARIOS;

INSERT INTO USUARIOS VALUES ('ANUNES','ARTHUR','TESTE','ANUNES',1);

INSERT ALL
  INTO USUARIOS VALUES ('ANUNES','ARTHUR','TESTE','ANUNES',1)
  INTO USUARIOS VALUES ('BSILVA','SILVA','TESTE1','BSILVA',1)
  INTO USUARIOS VALUES ('JSANTOS','SANTOS','TESTE1','JSANTOS',0)
SELECT * FROM DUAL;

SELECT * FROM USUARIOS;

SELECT USERNAME FROM DBA_USERS;

SELECT * FROM USUARIOS WHERE CD_USUARIO = '' AND CD_SENHA = '2';

UPDATE USUARIOS SET CD_SENHA = '123',SN_SENHA_PLOGIN = 1 WHERE CD_USUARIO = 'ANUNES';
