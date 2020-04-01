# Relazione Sviluppo Bot Matrix

## Linguaggio di programmazione

**NodeJS**: è una versione di javascript che non funziona solamente lato client ma è in grado di funzionare anche lato server.

## Gestione dei moduli NPM

**NPM**: acronimo di Node Packet Manager permette di scaricare e implementare un numero molto esteso di pacchetti reperibili per l'appunto al sito https://www.npmjs.com/.

## Creazione del progetto

Per prima cosa, per iniziare un progetto, è necessario recarsi all'interno di una directory e digitare `npm init` che serve a inizializzare un file package.json. Questo file contiene tutte le informazioni essenziali per il progetto, eccone un esempio:
```
{
  "name": "matrix_bot",
  "version": "1.0.0",
  "description": "",
  "main": "app.js",
  "scripts": {
    "start": "node app.js"
  },
  "author": "Jacopo De Gattis",
  "license": "ISC"
}
```

Una volta creato il file package.json bisognerà scaricare i pacchetti necessari allo sviluppo del nostro progetto: nel nostro caso utilizzeremo la libreria https://github.com/matrix-org/matrix-js-sdk scaricabile con il comando: `npm install matrix-js-sdk`.

Come si può notare, all'interno del file package.json esiste una riga denominata "start" che contiene il comando che permetterà l'avvio in seguito del nostro programma. **Node** richiama il software nodejs e app.js è il file che verrà eseguito. Per avviare il progetto quindi è necessario creare un file con nome app.js e scrivere all'interno di esso tutto il codice necessario. Il comando per l'avvio quindi sarà `npm start`.

## Matrix-JS-Sdk

Questa libreria permette di interfacciarsi con l'API di RIOT.im, più nello specifico con Matrix al fine di eseguire tutta una serie di operazioni, partendo dal login per arrivare alla ricezione e all'invio dei messaggi.

Non riporto esempi di codice poiché sono tutti reperibili sul repository github seguente: https://github.com/matrix-org/matrix-js-sdk.

## Codice file app.js

### Importazione della librerie

```
const sdk = require('matrix-js-sdk');
```

Attraverso il comando `require` importo la libreria 'matrix-js-sdk' all'interno della costante `sdk`.

### Impostazione del nome utente Matrix
```
const myUserId = "nomeUtenteMatrix";
```
Per ottenere il nome utente è sufficiente recarsi sull'app Riot e fare click in alto a sinistra sul nostro utente. Sotto verrà mostrato un nome utente che inizia con '@' e che include 'matrix.org'. Nel mio caso ad esempio il nome utente è il seguente: '@jacopodega:matrix.org'.

![](https://about.riot.im/images/home-communication-p-1080.png)

In questo caso ad esempio è sufficiente clickare sulla scritta 'Victor' e il nome utente verrà mostrato nella finestra sottostante.

### Creazione dell'oggetto client

```
const client = sdk.createClient({
    baseUrl: "https://matrix.org",
    accessToken: myAccessToken,
    userId: myUserId,
});
```

In questo modo richiamo il metodo createClient dell'oggetto sdk e ottengo come valore di ritorno un oggetto di tipo client. I dati che passo al metodo createClient sono quelli essenziali; risulta infatti possibile aggiungerne molti altri in base alle proprie esigenze.

* **baseUrl**: contiene l'indirizzo del nostro 'home server' ovvero del server che usiamo sulla piattaforma riot. Nel nostro caso, essendo che non lo abbiamo creato noi, usiamo il server di default della piattaforma Matrix ovvero "https://matrix.org".

* **accessToken**: l'accessToken è la variabile che permette di stabilire un'autenticazione tra il nostro programma e i server di Matrix. Questo token infatti sarà inviato al server ogni qualvolta noi faremo una richiesta. Supponiamo ad esempio di dover dare una richiesta a questo link: https://api.matrix.com/getMessages. Bene per poterci autenticare al momento della richiesta dovremo aggiungere alla richiesta il parametro accessToken nel seguente modo: https://api.matrix.com/getMessages?accessToken="nostroAccessToken". La richiesta può essere sia POST che GET, dipende dalla scelta fatta dal servizio. Il metodo si può trovare nella documentazione ufficiale di Matrix. Il token è possibile ottenerlo andando sulla piattaforma riot, cliccando sulle impostazioni del profilo, andando sulla voce "help & about" (l'ultima nella lista) e andare infondo nella sezione "Avanzate". A questo punto basta clickare sulla voce clicca per rivelare che ci mostrerà il nostro Access Token.

* **userId**: contiene il nostro nome utente e viene utilizzato per l'invio e la ricezione dei messaggi su Riot.

## Gestione degli eventi

Questa libreria come quasi tutte quelle disponibili su npm permette di gestire gli eventi. Gli eventi vengono triggerati nel momento in cui l'azione indicata dall'utente si realizza. Supponiamo ad esempio di avere il seguente codice:

```
client.on('event', handleEvent);
```

Il metodo on permette di eseguire la funzione di CallBack chiamata 'handleEvent' nel momento in cui l'azione 'event' viene triggerata dall'oggetto client e emessa dal metodo 'on'.

Nel codice sopra riportato ad esempio richiamiamo la funzione `handleEvent` nel momento in cui l'azione event viene triggerata.

La funzione handleEvent è la seguente:

```
function handleEvent(event) {
    if (event.getType() === "m.room.message") {
        if (event.isEncrypted()) {
            console.log("NOT YET SUPPORT: content is encrypted!");
        } else {
            var msg = event.event.content.body;
            var sender = event.getSender();
            console.log("(%s) : %s", sender, msg);
        }
    }
}
```

Questa funzione riceve come parametro un evento e verifica che sia di tipologia messaggio. A questo punto se la verifica è positiva verifica se il messaggio (evento) è criptato e in tal caso stampa a schermo un avviso indicando che gli eventi criptati non sono ancora supportati. Altrimenti prende il contenuto del messaggio e il nome utente di colui che l'ha inviato e lo stampa a schermo.

### Formato delle richieste HTTP

Tutti i risultati sono in formato JSON, quindi facili da comprendere e da parsificare in JavaScript.
Un esempio di messaggio in JSON è il seguente: 
```
{
  "content": {
    "body": "ciao",
    "msgtype": "m.text"
  },
  "origin_server_ts": 1585730463229,
  "sender": "@jacopodega:matrix.org",
  "type": "m.room.message",
  "unsigned": {
    "age": 737,
    "transaction_id": "m1585730464716.13"
  },
  "event_id": "$7x0-nzaBSFQfydY6lce278mkkK9X4CQMQvlD601YiUY",
  "room_id": "!jUGkFrLKpFokATUvdr:matrix.org"
} 
```

### Avvio del client

L'ultimo step, non per importanza, consiste nell'avviare il client attraverso il comando
```
client.startClient({ initialSyncLimit: 0 });
```
che permette per l'appunto di avviare il processo di 'sync' tra il client e il server. In questo modo il client sincronizza i messaggi, gli utenti e tutti i rispettivi eventi con gli altri client.

## Fonti
* https://github.com/matrix-org/matrix-js-sdk
* https://www.npmjs.com/
* https://nodejs.org/en/
* http://matrix-org.github.io/matrix-js-sdk/5.2.0/index.html