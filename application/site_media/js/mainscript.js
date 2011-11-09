$(document).ready(	
	function(){
		$('header h1').bind('click', irMainPage);
		$('#admin_button').bind('click', ingresarAdmin);
		$('#client_button').bind('click', transicion);
		$('#productos article').bind('mouseover', mostrarAdd);
		$('#productos article').bind('mouseout', ocultarAdd);
		$('.botoncomprar').bind('click', mostrarCart);
	}
);
var first = true;
function irMainPage(){
	window.location.href = "http://localhost/ChompasDeAlpaca/";
}

function ingresarAdmin(){
	if(first){
		$('#client_button').fadeOut('slow', cambiarTamano);
		first = false;		
	}
}

function cambiarTamano(){
	$('#admin_button').animate({
		width: '10%'
	}, mover_addminbutton);
}

function mover_addminbutton(){
	$('#admin_button').animate({
		left : '+=20em'
	}, mostrarFormulario);
}

function mostrarFormulario(){
	$('#admin_button').css('margin-bottom','0')
	$('#formulario').fadeIn();
}

function transicion(){
	$('#admin_button').fadeOut('slow');
	$('#client_button').fadeOut('slow', mostrarCatalogo);	
}

function mostrarCatalogo(){
	var data = {
		'ajax' : true
	}
	$.ajax({
		url : 'shop/catalog',
		type : 'POST',
		data : data,
		success : function(msg){
			// console.log(msg);
			$('#main_content').html(msg);
		}
	});
	
	window.location.href = window.location.href + 'shop/catalog';
	var location = window.location.href;
	console.log(location);
}

function mostrarAdd(){
	$(this).find('button').show();
}

function ocultarAdd(){
	$(this).find('button').hide();
}

function mostrarCart(){
	$('#cart_empty').fadeOut('slow', function(){
		$('#tablecart').fadeIn('slow');	
	});	
}