var btn_edit_click = function(self){	
	var list_parent = $(self).parents('li'),
		span_title = $(list_parent).find('span.title'),
		input_title = $(list_parent).find('input.title');	
	
	$(span_title).toggleClass('hide');
	$(input_title).toggleClass('hide');
};

var input_edit_keyup = function(self, e){
	if(e.keyCode === 13) 
	{
		var list_parent = $(self).parents('li'),
			span_title = $(list_parent).find('span.title'),
			input_title = $(list_parent).find('input.title');	
		
		$(span_title).removeClass('hide');
		$(input_title).addClass('hide');
	}
}
