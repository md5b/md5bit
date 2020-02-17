# INFORMATICA
## SQL
### Descrizione

### Comandi

#### Connessione
	#mysql mysql
	mysql> SHOW DATABASES;


#### Creazione database
	mysql> CREATE DATABASE nomedb CHARACTER SET utf8;

#### Eliminazione database
	mysql> DROP DATABASE nomedb;

#### Creazione di un utente
	mysql> GRANT ALL PRIVILEGES IN nomedb. *
	TO nomedb@localhost
	IDENTIFIED BY 'password'WHIT GRANT OPTION;
	mysql> exit
	
#### Connessione come utente
	$ mysql -u nomedb -p
	(password)
	mysql> use nomedb
	Database changed;

#### Creazione tabelle
	CREATE TABLE nometable (
	id int PRIMARY KEY AUTO_INCREMENT,
	id_nomechiave int NOT NULL
	campo varchar(n));

#### Riempimento database
	INSERT INTO nometable (campo) VALUES ('valore');

	#### Collegamento tra tabella1 e tabella2
	INSERT INTO tabella1 (campo, chiave, chiave, ecc..) VALUES ('valore'); 

#### Interrogazione database
	SELECT * FROM entità;
	SELECT entità.campo, entità2.campo FROM entità, entità2 WHERE entità.id=entità.id_entità;

#### doc LibreOffice
	#apt-get install libreoffice-help-it libreoffice-l10n-it
	#apt-get install libreoffice-mysql-connector


