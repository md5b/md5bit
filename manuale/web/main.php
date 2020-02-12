<?php
include ('etc/conf.php');
include ('lib/html.php');
include ('lib/database.php');
include ('sub/funzioni.php');
$page = "";
$page .= get_html_head("Manuale");
$page .= incapsula("Manuale", "h1");
if(connetti_db()){
    $page .= commento ("connessione riuscita");
    $sql = "SELECT * FROM argomenti;";
    $a_capo = PHP_EOL;
    //$page .= incapsula("SQL: " . $a_capo . $sql, "pre");
    //$page .= get_html_select_from_query($sql);
    $page .= get_html_table_from_query($sql, 'class="table"');
    //$mysqli->close();    
    }
else{
    $page .= commento("errore connessione al db");
    }
$page .= get_html_foot();
echo $page;
