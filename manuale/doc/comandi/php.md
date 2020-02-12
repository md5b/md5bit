# INFORMATICA
	## PHP
		
		### Descrizione
		
		### Comandi
			#### Comandi base
				
				##### Intestazione
					<?php
					
				##### Chiusura
					?>
				
				##### Creare un commento
					//TODO: Intestazione pagina
				
				##### Creare una variabile int
					$numero1=10;
				
				##### Creare una variabile string
					$parola="ciao";
				
				##### Stampare un testo
					echo "ciao";
				
				##### Stampare una variabile
					echo $parola;
				
				##### Creare una tabella
					echo "<table border>";
					
				##### Creare una condizione if
					if($x==10)
					
				##### Creare un ciclo for
					for($i=$cont; $i>0; $i--)
					
				##### Ottenere valore dall'url
					$_GET["start"];

			#### Collegare php al database

				##### Includere un file 
					include("etc/config.php");	//contiene i dati per accedere al db

				##### Creare la connessione
					$conn= new mysqli($db_host, $db_user, $db_pw, $db_name);

				##### Controllare che non ci siano errori nella connessione
					$conn->connect_error

				##### Ottenere l'insieme dei risultati
					$result= $conn->query($sql);
					
				##### Controllare che il database non sia vuoto
					if($result->num_rows>0)
					
				##### Scorrere il db
					while($row=$result->fetch_assoc()){		

				##### Stampare un dato del database della linea
					echo $row["nome"];	
						
				##### Chiudere la connessione
					$conn->close();
