var delete_row = function(self){
	var row = $(self).closest('tr');
	
	$(row).remove();
};

var edit_row = function(self){
	var row = $(self).closest('tr');
	
	$(row).find('span').toggleClass('hide');
	$(row).find('input').toggleClass('hide');
	$(row).find('select').toggleClass('hide');
};

var remove_skill_cv_edit = function(self){
	var item_box = $(self).parents('#skills-collection .item'),
		hidden_input_status = $(item_box).find('#input-skill-status'),
		status = $(hidden_input_status).val();

	event.preventDefault();

	switch (status){
		case '2':
			$(item_box).addClass('hide');
			$(hidden_input_status).val(3);
			break;

		case '1':
			$(item_box).remove();
			break;
	}
};

var remove_lang_cv_edit = function(self){
	var item_box = $(self).parents('#lang-collection .item'),
		hidden_input_status = $(item_box).find('#input-lang-status'),
		status = $(hidden_input_status).val();

	event.preventDefault();

	switch (status){
		case '2':
			$(item_box).addClass('hide');
			$(hidden_input_status).val(3);
			break;

		case '1':
			$(item_box).remove();
			break;
	}
};