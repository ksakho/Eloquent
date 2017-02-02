<?php

require_once 'vendor/autoload.php';
use gamePedia\config\AppInit;
AppInit::bootEloquent("connection.ini");
use Illuminate\Database\Capsule\Manager as DB;

DB::connection()->enableQueryLog();

use gamePedia\model\Game;
use gamePedia\model\Character;
use gamePedia\model\Company;
use gamePedia\model\RatingBoard;

	//$g= Game::select('name','deck');
	//$g=$g->where('name','like','%mario%')->get();
	//print $g;

	//$g2=Game::whereBetween('id',array());

	//afficher (name , deck) les personnages du jeu 12342

	/*$g= Game::find(12342);
	
	$p=$g->characters()->select('name','deck')->get();
	foreach($p as $perso){
		print_r($perso->id); //print $perso->id
	}
	//print $p;

	//les personnages des jeux dont le nom (du jeu) débute par 'Mario'

	$g = Game::where('name','like','Mario%')->get();
	foreach ($g as $game){
		$game->characters;
		print_r($game->name);	
		foreach($game->characters as $c){
			print_r($c->name);
		}
	}

	//les jeux développés par une compagnie dont le nom contient 'Sony'
	$comp = Company::where('name','like','%Sony%')->get();
	foreach($comp as $c){
		$c->developpedGames;
		print_r($c->name);

		foreach($c->developpedGames as $games){
			print_r($games->name);
		}
	}



	//le rating initial (indiquer le rating board) des jeux dont le nom contient Mario

	$game = Game::where('name','like','%Mario%')->get();

	foreach($game as $g){
	
		echo $g->name.':';	
		foreach($g->gameRatings as $rat){
			
			
				$r = $rat->ratingBoard;
				echo $r->name. '<br>';
						
		}
	}


	//les jeux dont le nom débute par Mario et ayant plus de 3 personnages
	
	$g1 = Game::where('name','like','Mario%')->has('characters', '>=', 3)->get();

	foreach($g1 as $g2){
		echo $g2->name.'<br>';
	}
	

	//les jeux dont le nom débute par Mario et dont le rating initial contient "3+"

	$game = Game::where('name','like','Mario%')
					->whereHas('gameRatings', function($q){
						$q->where('name','like','%3+%');
					})->get();

	foreach($game as $g){
		echo $g->name. '<br>';
	}


//les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
//"Inc." et dont le rating initial contient "3+"

$game = Game::where('name','like','Mario%')->whereHas('gameRatings', function($q){
						$q->where('name','like','%3+%');
					})->whereHas('developers',function($c){
						$c->where('name','like','%Inc%');
					})->get();

	foreach($game as $g){
		echo $g->name. '<br>';
	}
*/

//les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",
//dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé
//"CERO"

$game2 = Game::where('name','like','Mario%')->whereHas('gameRatings', function($q){
						$q->where('name','like','%3+%');
					})->whereHas('developers',function($c){
						$c->where('name','like','%Inc%');
					})->get();

	foreach($game2 as $g2){
		echo $g2->name. '<br>';
	}




$queries = DB::getQueryLog();
foreach( $queries as $q){
	
  echo $q['query'];
 
}