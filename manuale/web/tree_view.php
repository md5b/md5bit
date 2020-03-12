<?php
include ('etc/conf.php');
include ('lib/html.php');
include ('lib/database.php');
include ('sub/funzioni.php');

$page = "";
$page .= get_html_head("Manuale");

if(connetti_db()){  
    $page .= commento ("connessione riuscita");
    $a_capo = PHP_EOL;
    $page .= get_html_tree_view_from_query(1, 3); 
    }
else{
    $page .= commento("errore connessione al db");
    }
$page .= get_html_foot();
echo $page;
?>