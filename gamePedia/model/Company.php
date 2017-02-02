<?php
namespace gamePedia\model;
use Illuminate\Database\Eloquent\Model;

	class Company extends Model{
	
	protected $table='company';
	protected $primarykey='id';
	public $timestamps=false;

	public function developpedGames(){

		return $this->belongsToMany('\gamePedia\model\Game',
									'game_developers',
									'comp_id','game_id');	
	}
}