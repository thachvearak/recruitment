$(document).on('ready', function(){
	
	$('.btn-new-experience').on('click', function(){
		var form_new =  $(this).parents('#experience').find('.form-new');
			
		$(form_new).removeClass('hide');
	});
	
	$('#experience .form-new .btn-cancel').on('click', function(){
		var form_new =  $(this).parents('#experience').find('.form-new');
		
		$(form_new).addClass('hide');
	});
	
	/***** Edit CV *****/
	// Edit summary.
	$('#cv-edit #summary #btn-edit-summary').on('click', function(e){
		e.preventDefault();
		
		var content_show =  $(this).parents('.content-show'),
			form_edit = $(content_show).siblings('.form-edit');
		
		$(content_show).addClass('hide');
		$(form_edit).removeClass('hide');
	});
	
	$('#cv-edit #summary .form-edit .btn-cancel').on('click', function(){
		var summary = $(this).parents('#summary'),
			form_edit = $(summary).children('.form-edit'),
			content_show = $(summary).children('.content-show'),
			textarea = $(form_edit).find('textarea'),
			content =  $(content_show).children('p').text();
		
		textarea.val(content);
		
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});
	
	$('#cv-edit #summary .form-edit .btn-save').on('click', function(){
		var summary = $(this).parents('#summary'),
			form_edit = $(summary).children('.form-edit'),
			content_show = $(summary).children('.content-show'),
			textarea = $(form_edit).find('textarea');
				
		$.ajax({
			url: $(form_edit).find('form').attr('action'),
			type: 'PUT',
			data: {summary : $(textarea).val()},
			statusCode: {
			    403: function(response) {
			    	var error = JSON.parse(response.responseText).error;
			    	
					alert(error.message);
			    }
			  }
		}).done(function(data){
			
			$(content_show).children('p').text(data.summary);

			$(content_show).removeClass('hide');
			$(form_edit).addClass('hide');
		});	
	});
	
	
	// Edit cv experience.
	$('#cv-edit #experience #btn-edit-experience').on('click', function(e){
		e.preventDefault();
		
		var content_show =  $(this).parents('.content-show'),
			form_edit = $(content_show).siblings('.form-edit');
				
		$(content_show).addClass('hide');
		$(form_edit).removeClass('hide');
	});	
	$('#cv-edit #experience .form-edit .btn-cancel').on('click', function(){
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),
			span_job_title = $(content_show).find('#span-job-title'),
			span_company_name = $(content_show).find('#span-company-name'), 
			span_ex_location = $(content_show).find('#span-ex-location'),
			span_job_description = $(content_show).find('#span-job-description'),
			input_job_title = $(form_edit).find('#input-job-title'),
			input_company_name = $(form_edit).find('#input-company-name'),
			input_ex_location = $(form_edit).find('#input-ex-location'),
			input_job_description = $(form_edit).find('#input-job-description');
		
		
		$(input_job_title).val($(span_job_title).text());
		$(input_company_name).val($(span_company_name).text());
		$(input_ex_location).val($(span_ex_location).text());
		$(input_job_description).val($(span_job_description).text());
		
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});
	$('#cv-edit #experience .form-edit .btn-save').on('click', function(){
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),				
			span_job_title = $(content_show).find('#span-job-title'),
			span_company_name = $(content_show).find('#span-company-name'), 
			span_ex_location = $(content_show).find('#span-ex-location'), 
			span_description = $(content_show).find('#span-job-description'),
			span_from_date = $(content_show).find('#span-from-date'),
			span_to_date = $(content_show).find('#span-to-date'),
			input_job_title = $(form_edit).find('#input-job-title'),
			input_company_name = $(form_edit).find('#input-company-name'),
			input_ex_location = $(form_edit).find('#input-ex-location'),
			input_job_description = $(form_edit).find('#input-job-description'),
			input_ex_from_month = $(form_edit).find('#input-ex-from-month'),
			input_ex_from_year = $(form_edit).find('#input-ex-from-year'),
			input_ex_to_month = $(form_edit).find('#input-ex-to-month'),
			input_ex_to_year = $(form_edit).find('#input-ex-to-year');
		
		$.ajax({
			url: $(form_edit).find('form').attr('action'),
			type: 'PUT',
			data: {
				'ex-job-title'			: $(input_job_title).val(),
				'ex-company-name'		: $(input_company_name).val(),
				'ex-location'			: $(input_ex_location).val(),
				'ex-job-description'	: $(input_job_description).val(),
				'ex-from-month'			: $(input_ex_from_month).val(),
				'ex-from-year'			: $(input_ex_from_year).val(),
				'ex-to-month'			: $(input_ex_to_month).val(),
				'ex-to-year'			: $(input_ex_to_year).val(),
			},
			statusCode: {
			    403: function(response) {
			    	var error = JSON.parse(response.responseText).error;
			    	
					alert(error.message);
			    }
			  }
		}).done(function(data){
			$(span_job_title).text(data.ex_job_title);
			$(span_company_name).text(data.ex_company_name);			
			$(span_ex_location).text(data.ex_location);
			$(span_description).text(data.ex_job_description);
			
			if(data.ex_from_year !== '' && data.ex_from_month !== ''){
				$(span_from_date).text(data.ex_from_month_name + ' - ' + data.ex_from_year);
				$(span_from_date).attr('data-month', data.ex_from_month);
				$(span_from_date).attr('data-year', data.ex_from_year);
			}
			else if(data.ex_from_year !== ''){
				$(span_from_date).text(data.ex_from_year);
				$(span_from_date).attr('data-month', '');
				$(span_from_date).attr('data-year', data.ex_from_year);
			}
			else{
				$(span_from_date).text('');
				$(span_from_date).attr('data-month', '');
				$(span_from_date).attr('data-year', '');
			}
			
			if(data.ex_to_year !== '' && data.ex_to_month !== ''){
				$(span_to_date).text(data.ex_to_month_name + ' - ' + data.ex_to_year);
				$(span_to_date).attr('data-month', data.ex_to_month);
				$(span_to_date).attr('data-year', data.ex_to_year);
			}
			else if(data.ex_to_year !== ''){
				$(span_to_date).text(data.ex_to_year);
				$(span_to_date).attr('data-month', '');
				$(span_to_date).attr('data-year', data.ex_to_year);
			}
			else{
				$(span_to_date).text('Present');
				$(span_to_date).attr('data-month', '');
				$(span_to_date).attr('data-year', '');
			}
		});
		
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});
	
	
	
	// Edit cv education.
	$('#cv-edit #edu #btn-edit-edu').on('click', function(e){
		e.preventDefault();
		
		var content_show =  $(this).parents('.content-show'),
			form_edit = $(content_show).siblings('.form-edit');
				
		$(content_show).addClass('hide');
		$(form_edit).removeClass('hide');
	});	
	$('#cv-edit #edu .form-edit .btn-cancel').on('click', function(){
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show');
				
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});
	$('#cv-edit #edu .form-edit .btn-save').on('click', function(){
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),				
			span_institute = $(content_show).find('#span-institute'),
			span_major = $(content_show).find('#span-major'),
			span_degree = $(content_show).find('#span-degree'),
			span_from_year = $(content_show).find('#span-from-year'),
			span_grad_year = $(content_show).find('#span-grad-year'),
			input_institute = $(form_edit).find('#input-institute'),
			input_major = $(form_edit).find('#input-major'),
			input_degree = $(form_edit).find('#input-degree'),
			input_from_year = $(form_edit).find('#input-from-year'),
			input_grad_year = $(form_edit).find('#input-grad-year');
	
		
		$.ajax({
			url: $(form_edit).find('form').attr('action'),
			type: 'PUT',
			data: {
				'institute'			: $(input_institute).val(),
				'major'				: $(input_major).val(),
				'degree_id'			: $(input_degree).val(),
				'from-year'			: $(input_from_year).val(),
				'grad-year'			: $(input_grad_year).val()
			},
			statusCode: {
			    403: function(response) {
			    	var error = JSON.parse(response.responseText).error;
			    	
					alert(error.message);
			    }
			  }
		}).done(function(data){
			$(span_institute).text(data.institute);
			$(span_major).text(data.major);
			$(span_degree).text(data.degree);
			$(span_from_year).text(data.from_year);
			$(span_grad_year).text(data.grad_year);
		});
		
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});


	// Edit cv skills.
	$('#cv-edit #skills #btn-edit-skill').on('click', function(e){
		e.preventDefault();
		
		var content_show =  $(this).parents('.content-show'),
			form_edit = $(content_show).siblings('.form-edit');
				
		$(content_show).addClass('hide');
		$(form_edit).removeClass('hide');
	});	
	$('#cv-edit #skills .form-edit .btn-cancel').on('click', function(){
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),
			skills_collection =  $(form_edit).find('#skills-collection'),
			new_skill =  $(form_edit).find('#new-skill'),
			input_skill_name = $(new_skill).find('#input-skill-name'),
			input_skill_year_exp = $(new_skill).find('#input-skill-year-exp'),
			input_skill_level = $(new_skill).find('#input-skill-level');

		// Back to default.
		$(skills_collection).find('.item').each(function(index, element){
			var input_skill_status = $(element).find('#input-skill-status'),
				status = $(input_skill_status).val();

			switch(status){
				case '1':
					$(element).remove();
					break;

				case '3':
					$(input_skill_status).val(2);
					$(element).removeClass('hide');
					break;
			}
		});
				
		// Clear control and back to content show mode.
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
		$(input_skill_name).val(null);
		$(input_skill_year_exp).val(null);
		$(input_skill_level).prop('selectedIndex', 0);
	});
	$('#cv-edit #skills .form-edit #new-skill #btn-add').on('click', function(){
		var form_edit = $(this).parents('.form-edit'),
			new_skill = $(this).parents('#new-skill'),
			input_skill_name = $(new_skill).find('#input-skill-name'),
			input_skill_year_exp = $(new_skill).find('#input-skill-year-exp'),
			input_skill_level = $(new_skill).find('#input-skill-level option:selected'),
			skills_collection =  $(form_edit).find('#skills-collection');

		// Append new skill.
		$(skills_collection).append('<div class="item round-box-wrapper">' + 
										'<div class="span-content">' +
											'<span class="cv-info" id="skill-name">' + $(input_skill_name).val() +'</span>&nbsp;&nbsp;&nbsp;' + 
											'<span class="text-muted">' + $(input_skill_level).text() +' (' + $(input_skill_year_exp).val() + ')</span>&nbsp;' + 
											'<a href="javascript:onclick" class="glyphicon glyphicon-remove" onclick="remove_skill_cv_edit(this)" style="color: #7C7C7C; text-decoration: none; text-shadow: 0 1px 1px rgba(0,0,0,.2);"></a>' + 
										'</div>' +
										'<div class="hidden-input">' +
											'<input type="hidden" id="input-skill-id" value="">' +
											'<input type="hidden" id="input-skill-name" value="' + $(input_skill_name).val() + '">' +
											'<input type="hidden" id="input-skill-level" value="' + $(input_skill_level).val() + '">' +
											'<input type="hidden" id="input-skill-year-exp" value="' + $(input_skill_year_exp).val() + '">' +
											'<input type="hidden" id="input-skill-status" value="1">' +
										'</div>' +
									'</div>');
		

		// Clear add new controls.
		$(input_skill_name).val(null);
		$(input_skill_year_exp).val(null);
		$('#input-skill-level').prop('selectedIndex', 0);
	});
	$('#cv-edit #skills .form-edit .btn-save').on('click', function(){
		var form_edit = $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),
			span_items = $(content_show).find('.items'),
			skills_collection = $(form_edit).find('#skills-collection');


			items = $(form_edit).find('.item'),
			skills = [];

		$(items).each(function(index, element){
			var skill = {
				id 			: $(element).find('#input-skill-id').val(), 
				name 		: $(element).find('#input-skill-name').val(),
				level 		: $(element).find('#input-skill-level').val(),
				year_exp 	: $(element).find('#input-skill-year-exp').val(),
				status 		: $(element).find('#input-skill-status').val()
			};

			skills.push(skill);
		});
		
		$.ajax({
			url: $(form_edit).find('form').attr('action'),
			type: 'PUT',
			data: {
				'skills' : skills
			},
			statusCode: {
			    403: function(response) {
			    	var error = JSON.parse(response.responseText).error;
			    	
					alert(error.message);
			    }
			  }
		}).done(function(elements){

			// Clear old data.
			$(span_items).children().remove();
			$(skills_collection).children().remove();

			$(elements).each(function(index, element){
				// Update skill content show.
				$(span_items).append(
				'<div class="item round-box-wrapper">' +
					'<span class="cv-info" id="skill-name">' + element.name + '</span>&nbsp;&nbsp;&nbsp;&nbsp;' +
					'<span class="skill-detail text-muted">' + element.level + ' (' + element.year_experience + ' years)</span>' +
				'</div>');

				// Update skill form edit.
				$(skills_collection).append(
					'<div class="item round-box-wrapper">' +
						'<div class="span-content">' +
							'<span class="cv-info" id="skill-name">' + element.name + '</span>&nbsp;&nbsp;&nbsp;' +
							'<span class="skill-detail text-muted">' + element.level + ' (' + element.year_experience + ' years)</span>&nbsp;' +
							'<a href="javascript:onclick" id="btn-remove" class="glyphicon glyphicon-remove" onclick="remove_skill_cv_edit(this)" style="color: #7C7C7C; text-decoration: none; text-shadow: 0 1px 1px rgba(0,0,0,.2);"></a>' +
						'</div>' +
						'<div class="hidden-input">' +
							'<input type="hidden" id="input-skill-id" value="' + element.id + '">' +
							'<input type="hidden" id="input-skill-name" value="' + element.name + '">' +
							'<input type="hidden" id="input-skill-level" value="' + element.level_id + '">' +
							'<input type="hidden" id="input-skill-year-exp" value="' + element.year_experience + '">' +
							'<input type="hidden" id="input-skill-status" value="2">' +
						'</div>' +
					'</div>'
				);
			});

			// Back to content show mode.
			$(content_show).removeClass('hide');
			$(form_edit).addClass('hide');
		});	
	});



	// Edit cv language.
	$('#cv-edit #languages #btn-edit-lang').on('click', function(e){
		var content_show =  $(this).parents('.content-show'),
			form_edit = $(content_show).siblings('.form-edit');

		e.preventDefault();
				
		$(content_show).addClass('hide');
		$(form_edit).removeClass('hide');
	});	
	$('#cv-edit #languages .form-edit .btn-cancel').on('click', function(e){		
		var form_edit =  $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),
			lang_collection = $(form_edit).find('#lang-collection');

		e.preventDefault();
		
		$(lang_collection).children().each(function(index, element){
			var input_lang_status = $(element).find('#input-lang-status'),
				status = $(input_lang_status).val();

			if(status == 1){ // Remove new items.
				$(element).remove();
			}
			else if(status == 3){ //restore old items.
				$(input_lang_status).val(2);
				$(element).removeClass('hide');
			}
			
		});		

				
		// Back to content show mode.
		$(content_show).removeClass('hide');
		$(form_edit).addClass('hide');
	});
	$('#cv-edit #languages .form-edit .btn-add').on('click', function(e){
		var form_edit =  $(this).parents('.form-edit'),
			lang_collection = $(form_edit).find('#lang-collection'),
			item_add_new = $(form_edit).find('.item-add-new'),
			item_clone_org = $(form_edit).find('.item-clone'),
			input_new_lang_name = $(item_add_new).find('#input-lang-name'),
			input_new_proficiency = $(item_add_new).find('#input-lang-proficiency'),
			item_clone = $(item_clone_org).clone();			

		e.preventDefault();

		// Prevent add empty.
		if(input_new_lang_name.val() == '' || input_new_proficiency.val() == '') return;

		// Copy value to cloned-item.
		$(item_clone).attr('class','item');
		$(item_clone).find('#input-lang-name').val($(input_new_lang_name).val());
		$(item_clone).find('#input-lang-proficiency').prop('selectedIndex', $(input_new_proficiency).val());
		$(item_clone).find('#input-lang-status').val(1);

		// Clear add-new-item.
		$(input_new_lang_name).val(null);
		$(input_new_proficiency).val(null);

		// Add new item before add-new-item.
		$(lang_collection).append(
			item_clone
		);
	});
	$('#cv-edit #languages .form-edit .btn-save').on('click', function(){
		var form_edit = $(this).parents('.form-edit'),
			content_show = $(form_edit).siblings('.content-show'),
			span_items = $(content_show).find('.items'),
			lang_collection = $(form_edit).find('#lang-collection'),
			item_clone_org = $(form_edit).find('.item-clone'),

			items = $(form_edit).find('#lang-collection .item'),
			langs = [];

		$(items).each(function(index, element){
			var lang = {
				id 			: $(element).find('#input-lang-id').val(), 
				name 		: $(element).find('#input-lang-name').val(), 
				proficiency : $(element).find('#input-lang-proficiency').val(),
				status 		: $(element).find('#input-lang-status').val()
			};

			langs.push(lang);
		});

		$.ajax({
			url: $(form_edit).find('form').attr('action'),
			type: 'PUT',
			data: {
				'language' : langs
			},
			statusCode: {
			    403: function(response) {
			    	var error = JSON.parse(response.responseText).error;
			    	
					alert(error.message);
			    }
			  }
		}).done(function(elements){
			// Clear old data.
			$(span_items).children().remove();
			$(lang_collection).children().remove();

			$(elements).each(function(index, element){

				// Update span items.
				$(span_items).append(
					'<div class="item">' +
						'<span class="lang">' + element.language + '</span>&nbsp;&nbsp;&nbsp;<span class="text-muted">' + element.proficiency + '</span>' +
					'</div>'
				);

				// Update input items.
				var item_clone = $(item_clone_org).clone();

				
				$(item_clone).attr('class','item');
				$(item_clone).find('#input-lang-name').val(element.language);
				$(item_clone).find('#input-lang-proficiency').prop('selectedIndex', element.proficiency_id);
				$(item_clone).find('#input-lang-id').val(element.id);
				$(item_clone).find('#input-lang-status').val(2);

				$(lang_collection).append(item_clone);
			});

			// Back to content show mode.
			$(content_show).removeClass('hide');
			$(form_edit).addClass('hide');
		});
	});
	/********************/
});
