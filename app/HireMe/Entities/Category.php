<?php namespace HireMe\Entities;

class Category extends \Eloquent {
	protected $fillable = [];
	protected $perPage = 8;

	public function candidates()
	{
		return $this->hasMany('HireMe\Entities\Candidate');
	}

	public function getPaginateCandidatesAttribute()
	{
		return Candidate::where('category_id', $this->id)->paginate();
	}
}