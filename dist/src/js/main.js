//Listener para el login
window.addEventListener('load', logeate, false);
window.addEventListener('load', buscaAjax, false);
function logeate (e) {
	//Abrir login
	$('#logeate').click(function(e) {
		$('.login-modal').css('top', '0');
	});
	//Cerrar login
	$('#closeLogin').click(function(e) {
		$('.login-modal').css('top', '-9999px');
	});
}
function buscaAjax(){
	//Llamada a las funciones que controlan las funciones ajax de los buscadores
	ajaxSearchAdmin();
	ajaxSearchCat();
	ajaxSearchTee();
}

jQuery(document).ready(function($) {

	/*****Area admin, carga contenido del menu lateral*****/
	var opt = $('.admin-options:not(:first-child)');
	var content = $('#adminMaincontent > div');

	opt.click(function(e) {
		var choosen = this.className.slice(14);	
		content.each(function(index, el) {
			if (el.className == choosen) {
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});

	/*************Modals ADD*************/
	$('.open-modal').click(function(e) {
		//Adds
		if ($(this).attr('id') == "addUser") {
			console.log($(this).attr('id'));
			$('#userModal').css('display', 'flex');
		}
		if ($(this).attr('id') == "addTee") {
			console.log($(this).attr('id'));
			$('#teeModal').css('display', 'flex');
		}
		if ($(this).attr('id') == "addCat") {
			console.log($(this).attr('id'));
			$('#catModal').css('display', 'flex');
		}
		//Edits
		if ($(this).attr('id') == "editUser") {
			$('#editUserModal').css('display', 'flex');
		}
		if ($(this).attr('id') == "editTee") {
			$('#editTeeModal').css('display', 'flex');
		}
		if ($(this).attr('id') == "editCat") {
			$('#editCatModal').css('display', 'flex');
		}

		//Drops
		if ($(this).attr('id') == "dropUser") {
			$('#dropUserModal').css('display', 'flex');
			var idNombre = $(this).parent('td').parent('tr').find('td:nth-child(2)').text();
			$('#deleteUserId').text(idNombre);
			//pasamos el id del usuario a borrar por GET al servidor
			$('#actionDeleteUser').attr("href", "../controller/delete_user.php?item=" + idNombre );
		}
		if ($(this).attr('id') == "dropTee") {
			$('#dropTeeModal').css('display', 'flex');
			var idTee = $(this).parent('td').parent('tr').find('td:nth-child(2)').text();
			$('#deleteTeeId').text(idTee);
			//pasamos el id de la camiseta a borrar por GET al servidor
			$('#actionDeleteTee').attr("href", "../controller/delete_tee.php?item=" + idTee );
		}
		if ($(this).attr('id') == "dropCat") {
			$('#dropCatModal').css('display', 'flex');
			var idCat = $(this).parent('td').parent('tr').find('td:nth-child(2)').text();
			$('#deleteCatId').text(idCat);
			//pasamos el id de la categoria a borrar por GET al servidor
			$('#actionDeleteCat').attr("href", "../controller/delete_cat.php?item=" + idCat );
		}
		
	});


	/***********Cerrar modales***********/
	$('.btn-cancel').click(function(e) {
		$('.modal').hide(200);
	});
});

/********Edit values********/
jQuery(document).ready(function($) {
	//Edit user data
	$('.edit-usu').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombre = self.parent('td').parent('tr').find('td:nth-child(3)').find('span:nth-child(1)').text();
		var apellido = self.parent('td').parent('tr').find('td:nth-child(3)').find('span:nth-child(2)').text();
		var dni = self.parent('td').parent('tr').find('td:nth-child(3)').find('span:nth-child(3)').text();
		var dir = self.parent('td').parent('tr').find('td:nth-child(4)').text();
		var email = self.parent('td').parent('tr').find('td:nth-child(5)').text();
		var pass = self.parent('td').parent('tr').find('td:nth-child(6)').text();
		var tipo = self.parent('td').parent('tr').find('td:nth-child(7)').text();
		var modal = $('#editUserModal');
		modal.find('#set_userId').val(id);
		modal.find('#set_userName').val(nombre);
		modal.find('#set_userApellido').val(apellido);
		modal.find('#set_userDni').val(dni);
		modal.find('#set_userDir').val(dir);
		modal.find('#set_userEmail').val(email);
		modal.find('#set_userPassword').val(pass);
		modal.find('#set_userTipo').val(tipo);
	});
	//Edti Tee data
	$('.edit-tee').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombre = self.parent('td').parent('tr').find('td:nth-child(3)').text();
		var descripcion = self.parent('td').parent('tr').find('td:nth-child(4)').text();
		var cantidad = self.parent('td').parent('tr').find('td:nth-child(5)').text();
		var precio = self.parent('td').parent('tr').find('td:nth-child(6)').text();
		var color = self.parent('td').parent('tr').find('td:nth-child(7)').text();
		var talla = self.parent('td').parent('tr').find('td:nth-child(8)').text();
		//var imagen = self.parent('td').parent('tr').find('td:nth-child(9)').text();
		var cat = self.parent('td').parent('tr').find('td:nth-child(10)').text();
		var modal = $('#editTeeModal');
		modal.find('#set_teeId').val(id);
		modal.find('#set_teeName').val(nombre);
		modal.find('#set_teeDescripcion').val(descripcion);
		modal.find('#set_teeCantidad').val(cantidad);
		modal.find('#set_teePrecio').val(precio);
		modal.find('#set_teeColor').val(color);
		modal.find('#set_teeTalla').val(talla);
		//modal.find('#set_teeImagen').val(imagen);
		modal.find('#set_teeCategoria').val(cat);
	});
	//Edit cat data
	$('.edit-cat').click(function(e) {
		var self = $(this);
		var id = self.parent('td').parent('tr').find('td:nth-child(2)').text();
		var nombre = self.parent('td').parent('tr').find('td:nth-child(3)').text();
		var modal = $('#editCatModal');
		modal.find('#set_catId').val(id);
		modal.find('#set_catName').val(nombre);
	});
});

/********** TABS **********/
jQuery(document).ready(function($) {
	var tabs = $('.tab-content');
	$('#tabMenu .tab-title').click(function(e) {
		var self = $(this);
		var allTabs = $('.tab-title');
		allTabs.removeClass('active');
		self.addClass('active');
		var trigger= self.attr('data-tab');
		tabs.each(function(index, el) {
			if ((index+1) == trigger) {
				$(this).show(200);
			}else{
				$(this).hide(200);
			}
		});
	});
});


/***************** BUSCADORES AJAX *****************/
function ajaxSearchAdmin(){
	$('#userSearch').keyup(function(e) {
		var search = $(this).val();
		$.ajax({
			url: '../controller/ajax_usu_search.php',
			type: 'POST',
			data: {'search': search},
			beforeSend: function(){

			}
		})
		.done(function(resultado) {
			//console.log("success");
			$('#resultAjaxUsu').html(resultado);
		})
		.fail(function() {
			//console.log("error");
		})
		.always(function() {
			//console.log("complete");
			if ($('#userSearch').val() == "") {
				$('#resultAjaxUsu').html("");
			}
		});
		
	});
}
function ajaxSearchCat(){
	$('#catSearch').keyup(function(e) {
		var search = $(this).val();
		$.ajax({
			url: '../controller/ajax_cat_search.php',
			type: 'POST',
			data: {'search': search},
			beforeSend: function(){

			}
		})
		.done(function(resultado) {
			//console.log("success");
			$('#resultAjaxCat').html(resultado);
		})
		.fail(function() {
			//console.log("error");
		})
		.always(function() {
			console.log("complete");
			if ($('#catSearch').val() == "") {
				$('#resultAjaxCat').html("");
			}
		});
		
	});
}
function ajaxSearchTee(){
	$('#teeSearch').keyup(function(e) {
		var search = $(this).val();
		$.ajax({
			url: '../controller/ajax_tee_search.php',
			type: 'POST',
			data: {'search': search},
			beforeSend: function(){

			}
		})
		.done(function(resultado) {
			//console.log("success");
			$('#resultAjaxTee').html(resultado);
		})
		.fail(function() {
			//console.log("error");
		})
		.always(function() {
			console.log("complete");
			if ($('#teeSearch').val() == "") {
				$('#resultAjaxTee').html("");
			}
		});
		
	});
}


/********SLIDER HOME********/
(function($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-slider-testimonials').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: true,
        autoTimeout: 3000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 0,
            cols: 1,
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'default',
    });
})(jQuery, window, document);