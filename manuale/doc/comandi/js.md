# Informatica
## JavaScript
### Descrizione

Javascript __**È**__ CaseSensitive

### Comandi

#### Creazione delle varialibili
    var nomeVariabile;
##### Descrizione
    Le variabili in Javascript non hanno un tipo, è Javascript che si occupa di capire di che tipo sono le variabili.

##### getElementById()
	Questa funzione permette di ottenere un elemento tramite il suo Id, ovvero il suo nome identificativo.

#### Somma di stringhe
	Per creare delle concatenazioni di stringhe , in Javascript bisogna utilizzare il carattere "+"

#### Creazione array
	var cars = ["Saab", "Volvo", "BMW"];

#### Creazione di funzioni
	function myFunction(p1, p2){
  	return p1 * p2;   // The function returns the product of p1 and p2
	}
#### Richiamare una funzione
    myFunction(10, 2);

#### Randomizzazione
	function getRndInteger(min, max) {
  	return Math.floor(Math.random() * (max - min) ) + min;
	}
