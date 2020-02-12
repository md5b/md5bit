<?php

function get_html_head($titolopagina){
	$ans = "
	<!Doctype html>
	<html>
	<head>
		<link rel='stylesheet' href='../css/custom.css'>
		<link rel='stylesheet' href='../css/bootstrap.min.css'>
		<title> $titolopagina </title>
	</head>
	<body>
  	<nav class='navbar navbar-dark bg-dark'>
    	<a class='navbar-brand' href='#'>Manuale</a>
  	</nav>
	";
	return $ans;
	}
	
function get_html_foot(){
	$ans = "
	<script src='../js/bootstrap.min.js'></script>
	</body>
	</html>
	";
	return $ans;
	}
	






