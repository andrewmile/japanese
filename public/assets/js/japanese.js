$(document).ready(function() {
	
	$("div.toggle-btns").children('label').click(function() {
		var toggle = $(this).text().toLowerCase().trim();
		if($(this).hasClass('active')) {
			$('.li-'+toggle).hide();
		} else {
			$('.li-'+toggle).show();
		}
	});

	$("#type").change(function() {
		var type = $(this).val();
		$(".subtype").hide();
		$("[name = 'subtype']").val('').attr('disabled', true).hide();
		$("."+type).attr('disabled', false).show();
	});

});