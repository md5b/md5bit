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

	
#### Collegamento tra tabelle
##### Comando
##### Descrizione

#### Interrogazione database
##### Comando
##### Descrizione

#### Creazione doc LibreOffice
##### Comando
##### Descrizione

#### Relazioni tabelle
##### Comando
##### Descrizione

TODO= ...
