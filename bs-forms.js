jQuery(document).ready(function($) {
	$('form').submit(function(event) {
		var formErrors = 0;
		// input[type="text"], <select>
		$($(this).find('input[type="text"].required, input[type="password"].required, select.required, textarea.required')).each(function() {
			var fieldID = $(this).attr('id');
			if ( $(this).val().trim() == '' ) {
				$('#error-block-'+fieldID).slideDown();
				formErrors++;
			} else {
				$('#error-block-'+fieldID).slideUp();
			}
		});
		// checkboxes
		$($(this).find('.checkbox-form-group.required')).each(function() {
			var fieldID = $(this).attr('id');
			fieldID = fieldID.split('-');
			if ( !$(this).find('input[type="checkbox"]:checked').length ) {
				$('#error-block-'+fieldID[1]).slideDown();
				formErrors++;
			} else {
				$('#error-block-'+fieldID[1]).slideUp();
			}
		});

		// radio
		$($(this).find('.radio-form-group.required')).each(function() {
			var fieldID = $(this).attr('id');
			fieldID = fieldID.split('-');
			if ( !$(this).find('input[type="radio"]:checked').length ) {
				$('#error-block-'+fieldID[1]).slideDown();
				formErrors++;
			} else {
				$('#error-block-'+fieldID[1]).slideUp();
			}
		});

		if ( formErrors != 0 ) {
			event.preventDefault();
		}
	});
});