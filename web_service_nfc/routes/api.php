<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

function check_account($username) {
	$exists = false;

	$query = 'SELECT * FROM user WHERE username="' . $username . '"';
	$results = DB::select($query);

	if (count($results) > 0) {
		$exists = true;
	} else {
		$exists = false;
	}

	return $exists;
}

function check_login($username, $password) {
	$exists = false;

	$query = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . $password . '"';
	$results = DB::select($query);

	if (count($results) > 0) {
		$exists = true;
	} else {
		$exists = false;
	}

	return $exists;
}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/prova', function(Request $request) {
	$query = 'SELECT * FROM user';
    $results = DB::select($query); //Eseguo la query. reults è un array
    echo json_encode($results); 
});

Route::post('/all_documents', function(Request $request) {
	$username = $request->input('user'); //Leggo il parametro user dalla richiesta

	if (isset($username)) {
		if (check_account($username)) {
			$utype = explode(".", $username)[0]; //Indica il tipo di utente (studente o insegnante)
			$query = 'SELECT documents.nome, documents.url FROM documents WHERE categoria="' . $utype . '"';
		    $results = DB::select($query); //Eseguo la query. reults è un array

		    echo json_encode($results); //Ritorno il risultato della query in formato json
		} else {
			echo json_encode(array("error"=>"user not found"));
		}
	} else {
		echo json_encode(array("error"=>"user var not set"));
	}
});

Route::post('/login', function(Request $request) {
	$username = $request->input('user');
	//La password è salvata sottoforma di hash
	$password = md5($request->input('pass'));

	if (isset($username, $password)) {
		if (check_login($username, $password)) {
			return json_encode(array("status"=>200));
		} else {
			return json_encode(array("stauts"=>401));
		}
	} else {
		return json_encode(array("error"=>"You must set user value!"));
	}
});

Route::post('/new_user', function(Request $request) {

	$classe = $request->input('classe');
	$tipo = $request->input('tipo');
	$username = $request->input('user');
	//La password arriva in chiaro al server e poi viene trasformata in hash md5
	$password = md5($request->input('pass'));

	//In futuro inserire l'operazione di inserimento all'interno di un try-catch

	// TODO: problema id solo con phpmyadmin con mysql no
	$user_data = array("class"=>$classe, "categoria"=>$tipo, "username"=>$username, "password"=>$password);
	DB::table('user')->insert($user_data);

	return json_encode(array("operation"=>"success"));

});

//Identifico il documento tramite il campo ID della tabella Evento
Route::get('/get_document', function(Request $request) {

	$id_doc = $request->input('id');
	$query = "SELECT classe.*, evento.* FROM classe, evento WHERE";
	$results = DB::select($query);
	echo json_encode($results);

});