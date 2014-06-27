var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('S/.'+(precio*cantidad));
				$.post('./js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
					$("#total_cart_price").text('S/.'+e);
                    location.href="./cart.php";
				});
			}
		}

	});

	$(".eliminar").click(function(e){
        e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('js/eliminar.php',{
			Id:id
		},function(a){
			if(a=='0'){
				location.href="./cart.php";
			}else{
                location.href="./cart.php";
            }
		}
        );

	});
}	
$(document).on('ready',inicio);