 $(function(){
 	//xu lý checkbox all cho category
 	$('.checkbox_wrapper_category').on('click',function(){

        $(this).parents('.card').find('.checkbox_children_category').prop('checked', $(this).prop('checked'));
 	});

 	//xu lý checkbox all cho slider
 	$('.checkbox_wrapper_slider').on('click',function(){

        $(this).parents('.card').find('.checkbox_children_slider').prop('checked', $(this).prop('checked'));
 	});

 	$('.checkall').on('click',function(){
 		$(this).parents().find('.checkbox_children').prop('checked',$(this).prop('checked'));
 		$(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
 	});
 });
 