<?php
namespace gamePedia\model;
use Illuminate\Database\Eloquent\Model;
class game extends Model {
	
	protected $table='game';
	protected $primarykey='id';
	public $timestamps=false;


	public function characters(){

		return $this->belongsToMany('\gamePedia\model\Character',
									'game2character',
									'game_id','character_id');
	}

	public function developers(){

		return $this->belongsToMany('\gamePedia\model\Company',
									'game_developers',
									'game_id','comp_id');
	}


	/*public function ratings(){

		return $this->belongsTo('\gamePedia\model\RatingBoard',
									'game_id');
	}*/


	public function gameRatings(){
        
        return $this->belongsToMany('gamePedia\model\GameRating',
									'game2rating',
									'game_id','rating_id');
    }


}
