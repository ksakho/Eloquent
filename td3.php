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
use gamePedia\model\Platform;

$start_time = microtime(true);

//lister 442 jeux à partir du 21173ème, afficher leur nom, deck
//temps d'exécution : 0.15865397453308

/*
$g = Game::select('name','deck')
            ->skip(21172)->take(442)
            ->get();

            print $g;

//afficher les personnages des jeux dont le nom débute par 'Mario
$ch = Character::select('name')->whereHas('games', function($q){
    $q->where('name','like','Mario%'); 
})->get();

foreach($ch as $c){
    echo $c->name.'<br />';
}



$g = Game::where('name', 'like', 'Mario%')->get();

foreach($g as $game){
  print_r("<h4>" . $game->name . "</h4>");
  $characters = $game->characters;
  foreach($characters as $character){
    print_r($character->name . "<br />");
  }
}
$end_time = microtime(true);
$query_time = $end_time - $start_time;



//les jeux dont le nom débute par Mario et ayant plus de 3 personnages 

	$g1 = Game::where('name','like','Mario%')->has('characters', '>=', 3)->get();
    
	foreach($g1 as $g2){
		echo $g2->name.'<br>';
	}

//MESURES DE TEMPS
//1.Lister les jeux dont le nom débute par Mario
//temps d'exécution : 2.1626560688019
//temps d'exécution avec un index : 0.30996799468994

//lister les jeux dont le nom contient Mario / temps d'exécution : 2.2094941139221
//temps d'exécution avec index : 1.6636490821838'

$game = Game::where('name','like','Mario')->get();

        foreach($game as $g){
            echo $g->name.'<br>';
        }


  

//3.les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
//Temps d'exécution : 5.0898921489716
	$game = Game::where('name','like','Mario%')
					->whereHas('gameRatings', function($q){
						$q->where('name','like','%3+%');
					})->get();
    
	foreach($game as $g){
		echo $g->name. '<br>';
	}


//2.afficher les personnages des jeux dont le nom débute par 'Mario'
// Temps d'exécution = 2.124018907547/ 91 requêtes exécutées
$g = Game::where('name','like','Mario%')->get();
    
	foreach ($g as $game){
		$game->characters;
		print_r($game->name);	
		foreach($game->characters as $c){
			print_r($c->name v);
		}
	}

*/

//les jeux développés par une compagnie dont le nom contient 'Sony'
//temps d'exécution sans index: 1.2846350669861, 14 requêtes
//temps d'exécution avec index: 0.085357904434204

	/*$comp = Company::where('name','like','%Sony%')->get();
    

	foreach($comp as $c){
		$c->developpedGames;
		print_r($c->name);

		foreach($c->developpedGames as $games){
			print_r($games->name);
		}
	}

//Chargement lié
//Afficher le nom des personnages des jeux dont le nom contient 'Mario'

$ch = Character::select('name')->with(['games' => function($query){
		$query->where('name','like','%Mario%');
}])->get();
    
	$end_time = microtime(true);

	foreach($ch as $character){
 
		echo $character->name. '<br>';	
		
		}
	
*/

//Lister les plateformes dont la base installée est >= 10 000 000

 $p = Platform::where('install_base','>','10000000')->get();
 $end_time = microtime(true);
 foreach($p as $platform){
	 echo $platform->name."<br>";
 }


$queries = DB::getQueryLog();
echo '<pre>';
var_dump($queries);
echo '</pre>';
 



$query_time = $end_time - $start_time;
echo "Le temps d'éxecution est de ".$query_time;