<?php
namespace gamePedia\model;
use Illuminate\Database\Eloquent\Model;
class Character extends Model {
	
	protected $table='character';
	protected $primarykey='id';
	public $timestamps=false;


	public function games(){
		return $this->belongsToMany('\gamePedia\model\Game',
									'game2character',
									'character_id','game_id');
	}

}