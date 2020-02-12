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
			$tmp_body.=PHP_EOL;
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
