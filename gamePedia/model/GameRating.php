<?php
namespace gamePedia\model;
use Illuminate\Database\Eloquent\Model;

class GameRating extends Model{

    protected $table='game_rating';
	protected $primarykey='id';
	public $timestamps=false;

    public function games(){

        return $this->belongsToMany('\gamePedia\model\Game',
									'game_rating',
									'rating_board_id','game_id');

    }

    public function ratingBoard(){

        return $this->belongsTo('\gamePedia\model\RatingBoard', 'rating_board_id');
    }

}