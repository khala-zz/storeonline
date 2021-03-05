 $(function(){
 	//xu lý checkbox all cho category

 	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 	 //xu ly ajax để cap nhat dữ liệu note order
 	 $(document).on("click", "#order_note_submit" , function(e) {
 	 	e.preventDefault();
 	 	//alert('note');
 	 	var note_data = $("#order_note").val();
 	 	var edit_id = $(this).data('id');
 	 	
 	 	if(note_data != '' ){
 	 		$.ajax({
 	 			url: '/admin/orders/update-note',
 	 			type: 'get',
 	 			data: {_token: CSRF_TOKEN,note: note_data,note_order_id: edit_id},
 	 			success: function(response){
 	 				alert('cập nhật thành công');
 	 			}

 	 		});
 	 	}
 	 	else{
 	 		alert('Vui lòng điền chú thích');
 	 	}
 	 });
 	 
 	 //xu ly ajax để cap nhat dữ liệu confirm order
 	 $(document).on("click", "#order_confirm" , function(e) {
 	 	e.preventDefault();
 	 	
 	 	let confirm_order_data = $("#order_status").val();
 	 	let order_confirm_id = $(this).data('id');
 	 	
 	 	let that = $(this);
 	 	
 	 	$.ajax({
 	 		url: '/admin/orders/update-confirm',
 	 		type: 'get',
 	 		data: {_token: CSRF_TOKEN,confirm: confirm_order_data,confirm_order_id: order_confirm_id},
 	 		success: function(response){
 	 			
 	 			$check = $('#order_status').val();
 	 			
 	 			if($check == 'pending'){
 	 				
 	 				$html_order = '<i class="ti-settings text" aria-hidden="true"></i><input type="hidden" name="order_status" id="order_status" value="done"><span class="text" id="order_confirm_value">Đang cho duyệt</span> <i class="ti-settings text-active" aria-hidden="true"><span class="text-active">Đang chờ duyệt</span>';
 	 			}
 	 			else
 	 			{
 	 				
 	 				$html_order = '<i class="ti-check text" aria-hidden="true"></i><input type="hidden" name="order_status" id="order_status" value="pending"><span class="text" id="order_confirm_value">Đã duyệt</span><i class="ti-check text-active" aria-hidden="true"></i><span class="text-active">Đã duyệt</span>';
 	 			}
 	 			
 	 			that.html($html_order);
 	 			alert('cập nhật trạng thái đơn hàng thành công');
 	 		}

 	 	});
 	 });

 	 //xu ly ajax để cap nhat dữ liệu payment order
 	 $(document).on("click", "#order_payment" , function(e) {
 	 	e.preventDefault();
 	 	
 	 	let payment_order_data = $("#order_payment_status").val();
 	 	let order_payment_id = $(this).data('id');
 	 	
 	 	let that = $(this);
 	 
 	 	$.ajax({
 	 		url: '/admin/orders/update-payment',
 	 		type: 'get',
 	 		data: {_token: CSRF_TOKEN,payment: payment_order_data,payment_order_id: order_payment_id},
 	 		success: function(response){

 	 			$check = $('#order_payment_status').val();
 	 			
 	 			if($check == 'pending'){

 	 				$html_order = '<i class="ti-settings text" aria-hidden="true"></i><input type="hidden" name="order_payment_status" id="order_payment_status" value="done"><span class="text" id="order_payment_value">Đang cho duyệt</span> <i class="ti-settings text-active" aria-hidden="true"><span class="text-active">Đang chờ duyệt</span>';
 	 			}
 	 			else
 	 			{

 	 				$html_order = '<i class="ti-check text" aria-hidden="true"></i><input type="hidden" name="order_payment_status" id="order_payment_status" value="pending"><span class="text" id="order_payment_value">Đã duyệt</span><i class="ti-check text-active" aria-hidden="true"></i><span class="text-active">Đã duyệt</span>';
 	 			}

 	 			that.html($html_order);


 	 			alert('cập nhật trạng thái thanh toán thành công');
 	 		}

 	 	});
 	 	
 	 });
 	});
 