<?php
function connetti_db(){
    global $servername, $username, $password, $dbname, $conn;
    //global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);
	// controllo connessione
	if ($conn->connect_error) {
        return false;
        //die("Connection failed: " . $conn->connect_error);
		}
    return true; 
	}


function get_html_tree_view_from_query($id_argomento, $currentLevel = 0) {
	global $conn;
	$page = "";

	if ($currentLevel >= 0) {
		$sql = "SELECT nome, descrizione FROM argomenti WHERE id_argomento=$id_argomento";
		$array = $conn->query($sql);
		$n_row = $array->num_rows;
		//echo "$n_row sql: $sql";
		if ($n_row == 1) {
			$row = $array->fetch_array();
			$page .= "<h1>" . $row["nome"] . "</h1>"; 
			// TODO: stampare i comandi di id_argomento
			$sql = "SELECT id FROM argomenti WHERE id_padre=$id_argomento"; // Controllare id_argomento
			$page .= "<ul>";
			$array = $conn->query($sql);
			
			// currentelevel = -1; ogni ciclo for

			$currentLevel = $currentLevel-1;

			foreach ($array as $item => $value) {
				print_r($value);
				//$page .= get_html_tree_view_from_query()
			}

			$page .= "</ul>";
		} else {
			$page .= commento("I'm get_html_tree_view_from_query(): uscita anomala");
		}
}

	return $page;
}


function get_html_table_from_query($sql, $classe=""){
    $ans="";
    global $conn;
    $risultato = $conn->query($sql);
    if(($n_righe=$risultato->num_rows) > 0){
        $n_colonne=$risultato->field_count;
        //print_r($risultato->fetch_field());
        $tmp_head=PHP_EOL;
        for($i=0; $i<$n_colonne; $i++){
			$tmp_head .= incapsula($risultato->fetch_fields()[$i]->name, "th");
			}
		$tmp_head=incapsula($tmp_head, "tr");
		$tmp_head=incapsula($tmp_head, "thead", "class='thead-dark'");
		$tmp_body=PHP_EOL;
        for($i=0; $i<$n_righe; $i++){
			$row=$risultato->fetch_array();
			//print_r($row);
			$tmp_body.="<tr>";
			$tmp_body.= PHP_EOL;
			for($j=0; $j<$n_colonne; $j++){
				$tmp_body.=incapsula($row[$j], "td");
				}
				$tmp_body.="</tr>".PHP_EOL;
			}
			$tmp_body=incapsula($tmp_body, "tbody");
			$risultato->close();
		}
        
    $ans .= incapsula($tmp_head . $tmp_body, "table", $classe);
    return $ans;
	}


    
function get_html_select_from_query($sql, $default=0){
	global $conn;
	$ans="";
	$risultato = $conn->query($sql);
	
    if(($n_righe=$risultato->num_rows) > 0){
        $n_colonne=$risultato->field_count;
		$nome_select = $risultato->fetch_field()->name;
		
		}
	return $ans;
	}
