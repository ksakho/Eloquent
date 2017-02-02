<?php
namespace gamePedia\model;
use Illuminate\Database\Eloquent\Model;


class RatingBoard extends Model {
	
	protected $table='rating_board';
	protected $primarykey='id';
	public $timestamps=false;

	public function gamesRate(){

		return $this->hasMany('\gamePedia\model\Game',
									'rating_board_id');
	}

	public function gamesR(){

		return $this->hasMany('\gamePedia\model\GameRating','rating_board_id');
	}

}