<?php

class CandidateLanguage extends Eloquent 
{
	protected $table = 'can_languages';
	
	/***
	 * Get all of languages collection of candidate.
	 */
	public static function getLanguages($cv_id)
	{
		// Get table name.
		$tbl_this = with(new static)->getTable();
		$tbl_proficiency = (new \Proficiency)->getTable();
		
		return CandidateLanguage::select(DB::raw(
										"id,
										cv_id,
										language,
										proficiency_id,
										(SELECT proficiency FROM {$tbl_proficiency} WHERE id = {$tbl_this}.proficiency_id LIMIT 1) proficiency"
								))
								->where('cv_id', '=', $cv_id)
								->get();
	}
	
	/***
	 * Get a language detail.
	 */
	public function getLanguage()
	{
		// Get proficiency table name.
		$tbl_proficiency = (new \Proficiency)->getTable();
		
		return CandidateLanguage::select(DB::raw(
											"id,
											cv_id,
											language,
											proficiency_id,
											(SELECT proficiency FROM {$tbl_proficiency} WHERE id = {$this->table}.proficiency_id LIMIT 1) proficiency"
									))
									->where('id', '=', $this->id)
									->whereAnd('cv_id', '=', $this->cv_id)
									->first();
	}
}