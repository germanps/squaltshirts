
$(document).ready(function() {

	/*Area admin, carga contenido del menu lateral*/
	var opt = $('.admin-options');
	var content = $('#adminMaincontent div');

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

	/*Modals*/
	$('.open-modal').click(function(e) {
		if ($(this).attr('id') == "addUser") {
			console.log($(this).attr('id'));
			$('#userModal').show(100);
		}
		if ($(this).attr('id') == "addTee") {
			console.log($(this).attr('id'));
			$('#teeModal').show(100);
		}
		if ($(this).attr('id') == "addCat") {
			console.log($(this).attr('id'));
			$('#catModal').show(100);
		}

	});
	/*Cerrar modales*/
	$('.btn-cancel').click(function(e) {
		$('.modal').hide(200);
	});
});
