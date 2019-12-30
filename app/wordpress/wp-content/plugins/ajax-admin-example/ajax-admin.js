/*
	
	Ajax Example - JavaScript for Admin Area
	
*/
(function ($) {

	$(document).ready(function () {

		// when user submits the form
		$('.ajax-form').on('submit', function (event) {

			// prevent form submission
			event.preventDefault();

			// add loading message
			$('.ajax-response').html('Loading...');

			// define url
			var url = $('#url').val();
			// submit the data
			$.ajax({
				url: url,
				nonce: ajax_admin.nonce,
				success: function (res, status, xhr) {
					// log data
					console.log(res);

					// display data
					$('.ajax-response').html(status);
				}
			});

		});

	});

})(jQuery);