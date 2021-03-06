 $(function(){
 	//xu lý add to cart ajax

 	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 	 //xu ly ajax để cap nhat dữ liệu note order
 	 $(document).on("click", ".add-to-cart-ajax" , function(e) {
 	 	e.preventDefault();
 	 
    // get du lieu
     let dataId = $(this).data('id');
 	 	 let product_id = $("#product_id_"+dataId).val();
    	let product_name = $("#product_name_"+dataId).val();
    	let product_masp = $("#product_masp_"+dataId).val();
    	let product_color = $("#product_color_"+dataId).val();
    	let product_price = $("#product_price_"+dataId).val();
    
    alert(product_id);
 	 
 	 	
 	 	if(product_id != '' ){
 	 		$.ajax({
 	 			url: '/addToCartAjax',
 	 			type: 'get',
 	 			data: {_token: CSRF_TOKEN,product_id: product_id,product_name: product_name,product_masp: product_masp,product_color: product_color,product_price: product_price},
 	 			success: function(response){
 	 				alert(response);
 	 			}

 	 		});
 	 	}
 	 	else{
 	 		alert('them vao gio hang bi loi');
 	 	}
 	 });
 	 
 	 
 	 
 	});
 
