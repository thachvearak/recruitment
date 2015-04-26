<?php

class IndustryController extends BaseController
{
	public function index()
	{
		return Industry::get();
	}
	
	public function destroy($id)
	{
		return Industry::destroy($id);
	}
	
	public function update($id)
	{
		$industry = Industry::find($id);
		
		$industry->name = htmlentities(Input::get('name'));
    $industry->save();
    
    return $industry;
	}
	
	public function store()
	{
		$new_industry = [
			'name' => htmlentities(Input::get('name'))
		];
		
		// Check if the comment format is correct.
		if(in_array('', $new_industry))
		{
			throw new \PDOException('Invalid Data Format for Comment', 400);
		}
		
		return Industry::create($new_industry);;
	}
}