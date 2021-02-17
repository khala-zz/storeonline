jQuery(function ($) {
    
    ///////////Size of Product
    $("#idSize").change(function () {
        var SizeAttr=$(this).val();
        if(SizeAttr!=""){
            $.ajax({
                type:'get',
                url:'/get-product-attr',
                data:{size:SizeAttr},
                success:function(resp){
                    var arr=resp.split("#");
                    $("#dynamic_price").html('US $'+arr[0]);
                    $("#dynamicPriceInput").val(arr[0]);
                    if(arr[1]==0){
                        $("#buttonAddToCart").hide();
                        $("#availableStock").text("Hết hàng");
                        $("#inputStock").val(0);
                    }else{
                        $("#buttonAddToCart").show();
                        $("#availableStock").text("Còn hàng");
                        $("#inputStock").val(arr[1]);
                    }
                },error:function () {
                    alert("có lỗi xảy ra vui lòng cập nhật sau");
                }
            });
        }
    });

});

    

    


