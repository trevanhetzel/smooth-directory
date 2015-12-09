jQuery(document).ready(function ($) {
	'use strict';

    $('#smooth-filter-cat').on('change', function (e) {
       window.location = $(e.currentTarget).val()
    })
});
