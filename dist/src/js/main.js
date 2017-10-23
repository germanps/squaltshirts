
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
		};
		
	});
});