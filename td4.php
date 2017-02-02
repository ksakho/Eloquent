<?php

require_once 'vendor/autoload.php';
require_once '/path/to/Faker/src/autoload.php';

use gamePedia\config\AppInit;
AppInit::bootEloquent("connection.ini");
use Illuminate\Database\Capsule\Manager as DB;

DB::connection()->enableQueryLog();

use gamePedia\model\Game;
use gamePedia\model\Comment;
use gamePedia\model\User;


 $user_1 = new gamePedia\model\User;
 $user_1->mail = "user1@gmail.com";
 $user_1->save();

 $user_2 = new gamePedia\model\User;
 $user_2->mail = "user2@gmail.com";
 $user_2->save();

 $users = User::get();
  for($i = 0; $i < 3; $i++){
    $comments = $users->each(function($user){
      $comment = new gamePedia\model\Comment();
      $comment->content = "Ceci est un commentaire";
      $comment->user_id = $user->id;
      $comment->game_id = 12342;
      $comment->creation_date = date("Y/m/d");
      $comment->save();
    });
  }


$faker = Faker\Factory::create();

for($i = 0; $i < 25000; $i++){
 $user = new gamePedia\model\User;
 $user->mail = $faker->email;
 $user->save();

}

$users = User::select('id')->get();
$users_id =[];

foreach($users as $user){
    array_push($users_id, $user->id);
}

$games =  Game::select('id')->get();
$games_id = [];

foreach($games as $game){
    array_push($games_id, $game->id);
}

for($i = 0; $i < 250000; $i++){
    $u_id = array_rand($users_id);
    $g_id = array_rand($games_id);


 $comment = new gamePedia\model\Comment;
 $comment->mail = $faker->email;
 $comment->content = $faker->text;
 $comment->user_id = $u_id;
 $comment->game_id = $g_id;
 $comment->creation_date = $faker->date;
 $comment->save();

}