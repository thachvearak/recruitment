<?php

class CandidateEducation extends Eloquent 
{
	protected $table = 'can_educations';
	
	public static function getEducations($cv_id)
	{
		$tbl_this = with(new static)->getTable();
		$tbl_degree = (new \Degree)->getTable();
		$tbl_sch_situation = (new \SchoolSituation)->getTable();
		
		return CandidateEducation::select(DB::raw(
									"id,
									cv_id,
									institute,
									major,
									(SELECT description FROM {$tbl_degree} WHERE id = {$tbl_this}.degree_id LIMIT 1) degree,
									(SELECT description FROM {$tbl_sch_situation} WHERE id = {$tbl_this}.situation_id LIMIT 1) situation,
									degree_id,
									situation_id,
									from_year,
									grad_year"
								))
								->where('cv_id', '=', $cv_id)
								->get();
	}
	
	public function getEducation()
	{
		$tbl_degree = (new \Degree)->getTable();
		$tbl_sch_situation = (new \SchoolSituation)->getTable();
		
		return CandidateEducation::select(DB::raw(
									"id,
									cv_id,
									institute,
									major,
									(SELECT description FROM {$tbl_degree} WHERE id = {$this->table}.degree_id LIMIT 1) degree,
									(SELECT description FROM {$tbl_sch_situation} WHERE id = {$this->table}.situation_id LIMIT 1) situation,
									degree_id,
									situation_id,
									from_year,
									grad_year"
								))
								->where('id', '=', $this->id)
								->whereAnd('cv_id', '=', $this->cv_id)
								->first();
	}
}