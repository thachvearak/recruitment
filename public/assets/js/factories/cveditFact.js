app_candidate.factory('Experience', function($http){
	
	var Experience = function(data){
		this.setValue(data);
	};
	
	// Set experience properties values.
	Experience.prototype.setValue = function(data){
		this.id 				= data.id !== undefined ? data.id : '';
		this.cv_id 				= data.cv_id !== undefined ? data.cv_id : '';
		this.job_title 			= data.job_title !== undefined ? data.job_title : '';
		this.company_name 		= data.company_name !== undefined ? data.company_name : '';
		this.from_month 		= data.from_month !== undefined ? data.from_month : '';
		this.from_year 			= data.from_year !== undefined ? data.from_year : '';
		this.to_month 			= data.to_month !== undefined ? data.to_month : '';
		this.to_year 			= data.to_year !== undefined ? data.to_year : '';
		this.location 			= data.location !== undefined ? data.location : '';
		this.job_description 	= data.job_description !== undefined ? data.job_description : '';
		
		this.draft = {
			job_title 		: this.job_title,
			company_name 	: this.company_name,
			from_month 		: this.from_month,
			from_year 		: this.from_year,
			to_month 		: this.to_month,
			to_year 		: this.to_year,
			location 		: this.location,
			job_description : this.job_description	
		};
	};
	
	// Save old properties to draft.
	Experience.prototype.saveDraft = function(){	
		this.draft.job_title 		= this.job_title;
		this.draft.company_name 	= this.company_name;
		this.draft.from_month 		= this.from_month;
		this.draft.from_year 		= this.from_year;
		this.draft.to_month 		= this.to_month;
		this.draft.to_year 			= this.to_year;
		this.draft.location 		= this.location;
		this.draft.job_description 	= this.job_description;
	};
	
	// Set properties' value.
	Experience.prototype.restore = function(){
		this.job_title 			= this.draft.job_title;
		this.company_name 		= this.draft.company_name;
		this.from_month			= this.draft.from_month;
		this.from_year 			= this.draft.from_year;
		this.to_month 			= this.draft.to_month;
		this.to_year 			= this.draft.to_year;
		this.location 			= this.draft.location;
		this.job_description 	= this.draft.job_description;
	};
		
	// Send request to create new experience to database.
	Experience.prototype.save = function(){
		return $http.post(
			'/user/candidate/cv/edit/' + this.cv_id + '/experience', 
			this
		);
	};
	
	// Send update request.
	Experience.prototype.update = function(){	
		return $http.put(
			'/user/candidate/cv/edit/' + this.cv_id + '/experience/' + this.id, 
			this
		);
	};
	
	// Send delete request.
	Experience.prototype.delete = function(){
		return $http.delete(
			'/user/candidate/cv/edit/' + this.cv_id + '/experience/' + this.id
		);
	};
	
	return Experience;
})

.factory('Education', function($http){
	
	var Education = function(data){
		this.setValue(data);
	};
	
	// Set education value.
	Education.prototype.setValue = function(data){
		this.id 			= data.id !== undefined ? data.id : '';
		this.cv_id 			= data.cv_id !== undefined ? data.cv_id : '';
		this.degree 		= data.degree !== undefined ? data.degree : '';
		this.degree_id 		= (data.degree_id !== undefined && data.degree_id !== null) ? data.degree_id : '';
		this.from_year 		= data.from_year !== undefined ? data.from_year : '';
		this.grad_year 		= data.grad_year !== undefined ? data.grad_year : '';
		this.institute 		= data.institute !== undefined ? data.institute : '';
		this.major 			= data.major !== undefined ? data.major : '';
		this.situation 		= data.situation !== undefined ? data.situation : '';
		this.situation_id 	= (data.situation_id !== undefined && data.situation_id !== null) ? data.situation_id : '';
		
		this.draft = {
			degree			: this.degree,
			degree_id		: this.degree_id,
			from_year		: this.from_year,
			grad_year		: this.grad_year,
			institute		: this.institute,
			major			: this.major,
			situation		: this.situation,
			situation_id	: this.situation_id
		}
	};
	
	/***
	 * Save draft to backup data.
	 */
	Education.prototype.saveDraft = function(){
		this.draft.degree		= this.degree;
		this.draft.degree_id	= this.degree_id;
		this.draft.from_year	= this.from_year;
		this.draft.grad_year	= this.grad_year;
		this.draft.institute	= this.institute;
		this.draft.major		= this.major;
		this.draft.situation	= this.situation;
		this.draft.situation_id	= this.situation_id;
	};
	
	/***
	 * Restore the original data.
	 */
	Education.prototype.restore = function(){
		this.degree			= this.draft.degree;
		this.degree_id		= this.draft.degree_id;
		this.from_year		= this.draft.from_year;
		this.grad_year		= this.draft.grad_year;
		this.institute		= this.draft.institute;
		this.major			= this.draft.major;
		this.situation		= this.draft.situation;
		this.situation_id	= this.draft.situation_id;
	};
	
	/***
	 * Send request to server to create a new education.
	 */
	Education.prototype.createNew = function(){
		return $http.post(
				'/user/candidate/cv/edit/' + this.cv_id + ' /edu',
				this
		);
	};
	
	/***
	 * Send request to server to update an existing eduation.
	 */
	Education.prototype.update = function(){
		return $http.put(
			'/user/candidate/cv/edit/' + this.cv_id + '/edu/' + this.id,
			this
		);
	};
	
	/***
	 * Send request to server to delete an education.
	 */
	Education.prototype.delete = function(){
		return $http.delete(
			'/user/candidate/cv/edit/' + this.cv_id + '/edu/' + this.id
		);
	};
	
	return Education;
})

.factory('Skill', function($http){
	
	var Skill = function(data){
		this.setValue(data);
	};
	
	// Set skill value.
	Skill.prototype.setValue = function(data){
		this.id = data.id !== undefined ? data.id : '';
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';
		this.name = data.name !== undefined ? data.name : '';
		this.level_id = data.level_id !== undefined ? data.level_id : '';
		this.level = data.level !== undefined ? data.level : '';
		this.year_experience = data.year_experience !== undefined ? data.year_experience : '';
		
		this.draft = {
			name			: this.name,
			level_id		: this.level_id,
			level 			: this.level,
			year_experience : this.year_experience
		}
	};
	
	/***
	 * Save draft to backup data.
	 */
	Skill.prototype.saveDraft = function(){
		this.draft.name = this.name;
		this.draft.level_id = this.level_id;
		this.draft.level = this.level;
		this.draft.year_experience = this.year_experience;
	};
	
	/***
	 * Restore the original data.
	 */
	Skill.prototype.restore = function(){
		this.name = this.draft.name;
		this.level_id = this.draft.level_id;
		this.level = this.draft.level;
		this.year_experience = this.draft.year_experience;
	};
	
	/***
	 * Send request to server to create a new skill.
	 */
	Skill.prototype.createNew = function(){
		return $http.post(
			'/user/candidate/cv/edit/' + this.cv_id + '/skill',
			this
		);
	};
	
	/***
	 * Send request to server to delete a new skill.
	 */
	Skill.prototype.delete = function(){
		return $http.delete(
			'/user/candidate/cv/edit/' + this.cv_id + '/skill/' + this.id			
		);
	};
	
	return Skill;
})

.factory('Language', function($http){
	
	var Language = function(data){
		this.setValue(data);
	};
	
	/***
	 * Set proterties value function of object.
	 */
	Language.prototype.setValue = function(data){
		this.id = data.id !== undefined ? data.id : '';		
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';			
		this.language = data.language !== undefined ? data.language : '';		
		this.proficiency_id = (data.proficiency_id !== undefined && data.proficiency_id !== null)? data.proficiency_id : '';		
		this.proficiency = data.proficiency !== undefined ? data.proficiency : '';	
		
		this.draft = {
			language 		: this.language,
			proficiency_id 	: this.proficiency_id,
			proficiency 	: this.proficiency
		}
	};
	
	/***
	 * Save draft to backup data.
	 */
	Language.prototype.saveDraft = function(){
		this.draft.language 		= this.language;		
		this.draft.proficiency_id 	= this.proficiency_id;		
		this.draft.proficiency 		= this.proficiency;		
	};
	
	/***
	 * Restore the original data.
	 */
	Language.prototype.restore = function(){
		this.language 		= this.draft.language;		
		this.proficiency_id = this.draft.proficiency_id;		
		this.proficiency 	= this.draft.proficiency;	
	};
	
	/***
	 * Send request to server to create a new language.
	 */
	Language.prototype.createNew = function(){
		return $http.post(
			'/user/candidate/cv/edit/' + this.cv_id +'/lang',
			this
		);
	};
	
	/***
	 * Send request to server to delete a language.
	 */
	Language.prototype.delete = function(){
		return $http.delete(
				'/user/candidate/cv/edit/' + this.cv_id + '/lang/' + this.id
		);
	};
	
	return Language;
})

.factory('Function', function($http){
	
	var Function = function(data){
		this.setValue(data);
	};
	
	/***
	 * Set proterties value function of object.
	 */
	Function.prototype.setValue = function(data){	
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';
		this.function_id = data.function_id !== undefined ? data.function_id : '';
		this.function_name = data.function_name !== undefined ? data.function_name : '';
		
		this.draft = {
			function_id		: this.function_id,
			function_name	: this.function_name
		};
	};
	
	/***
	 * Save draft to backup data.
	 */
	Function.prototype.saveDraft = function(){
		this.draft.function_id = this.function_id;
		this.draft.function_name = this.function_name;
	};
	
	/***
	 * Restore original function.
	 */
	Function.prototype.restore = function(){
		this.function_id = this.draft.function_id;
		this.function_name = this.draft.function_name;
	};
	
	/***
	 * Send request to server to create a new function.
	 */
	Function.prototype.createNew = function(){
		return $http.post(
				'/user/candidate/cv/edit/' + this.cv_id +'/function',
			this
		);
	};
	
	/***
	 * Send request to server to delete a function.
	 */
	Function.prototype.delete = function(){
		return $http.delete(
				'/user/candidate/cv/edit/' + this.cv_id + '/function/' + this.function_id
		);
	};
	
	return Function;
})

.factory('Industry', function($http){
	
	var Industry = function(data){
		this.setValue(data);
	};
	
	/***
	 * Set proterties value industry of object.
	 */
	Industry.prototype.setValue = function(data){
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';
		this.industry_id = data.industry_id !== undefined ? data.industry_id : '';
		this.industry_name = data.industry_name !== undefined ? data.industry_name : '';
		
		this.draft = {
			industry_id		: this.industry_id,
			industry_name	: this.industry_name
		};
	};
	
	/***
	 * Save draft to backup data.
	 */
	Industry.prototype.saveDraft = function(){
		this.draft.industry_id = this.industry_id;
		this.draft.industry_name = this.industry_name;
	};
	
	/***
	 * Restore original industry.
	 */
	Industry.prototype.restore = function(){
		this.industry_id = this.draft.industry_id;
		this.industry_name = this.draft.industry_name;
	};
	
	/***
	 * Send request to server to delete a new industry.
	 */
	Industry.prototype.createNew = function(){
		return $http.post(
				'/user/candidate/cv/edit/' + this.cv_id +'/industry',
			this
		);
	};
	
	/***
	 * Send request to server to delete a industry.
	 */
	Industry.prototype.delete = function(){
		return $http.delete(
				'/user/candidate/cv/edit/' + this.cv_id + '/industry/' + this.industry_id
		);
	};
	
	return Industry;
})

.factory('Location', function($http){
	
	var Location = function(data){
		this.setValue(data);
	};
	
	/***
	 * Set proterties value location of object.
	 */
	Location.prototype.setValue = function(data){
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';
		this.location_id = data.location_id !== undefined ? data.location_id : '';
		this.location_name = data.location_name !== undefined ? data.location_name : '';
		
		this.draft = {
			location_id		: this.location_id,
			location_name	: this.location_name
		};
	};
	
	/***
	 * Save draft to backup data.
	 */
	Location.prototype.saveDraft = function(){
		this.draft.location_id = this.location_id;
		this.draft.location_name = this.location_name;
	};
	
	/***
	 * Restore original location.
	 */
	Location.prototype.restore = function(){
		this.location_id = this.draft.location_id;
		this.location_name = this.draft.location_name;
	};
	
	/***
	 * Send request to server to delete a new location.
	 */
	Location.prototype.createNew = function(){
		return $http.post(
				'/user/candidate/cv/edit/' + this.cv_id +'/location',
			this
		);
	};
	
	/***
	 * Send request to server to delete a location.
	 */
	Location.prototype.delete = function(){
		return $http.delete(
				'/user/candidate/cv/edit/' + this.cv_id + '/location/' + this.location_id
		);
	};
	
	return Location;
})

.factory('JobTerm', function($http){
	
	var JobTerm = function(data){
		this.setValue(data);
	};
	
	/***
	 * Set proterties value job term of object.
	 */
	JobTerm.prototype.setValue = function(data){
		this.cv_id = data.cv_id !== undefined ? data.cv_id : '';
		this.term_id = data.term_id !== undefined ? data.term_id : '';
		this.term = data.term!== undefined ? data.term : '';
		
		this.draft = {
			term_id	: this.term_id,
			term	: this.term
		};
	};
	
	/***
	 * Save draft to backup data.
	 */
	JobTerm.prototype.saveDraft = function(){
		this.draft.term_id 	= this.term_id;
		this.draft.term 	= this.term;
	};
	
	/***
	 * Restore original job term.
	 */
	JobTerm.prototype.restore = function(){
		this.term_id = this.draft.term_id;
		this.term 	 = this.draft.term;
	};
	
	/***
	 * Send request to server to add a new job term.
	 */
	JobTerm.prototype.createNew = function(){
		return $http.post(
				'/user/candidate/cv/edit/' + this.cv_id +'/job_term',
			this
		);
	};
	
	/***
	 * Send request to server to delete a job term.
	 */
	JobTerm.prototype.delete = function(){
		return $http.delete(
				'/user/candidate/cv/edit/' + this.cv_id + '/job_term/' + this.term_id
		);
	};
	
	return JobTerm;
});
