/*
 * selectNav 0.1.7	http://jlix.net/extensions/jquery/selectNav/0.1.7
 *
 * Copyright (c) 2009 Sander Aarts	(jlix.net)
 * Dual licensed under the MIT (http://jlix.net/MIT.txt)
 * and GPL (http://jlix.net/GPL.txt) licenses.
 *
 * Requires jQuery to work	(jquery.com). Tested with version 1.2.6
 *
 * 2008-07-15
 */
(function($) {
	$.fn.extend( {
		selectNav: function() { // v0.1.7
			//	Adds auto submit behavior to select boxes, for navigational use. Works with keyboard too (in IE, Fx and Op)
			//	CSS:		.jsSelectNav (on parent of select box)
			return this
				.filter("select")
				.each( function() {
					$(this)
						.focus( function() { $(this).data("origValue", this.value); } )
						.change( function() {
							if ( $(this).data("newValue") ) $(this).data("origValue", $(this).data("newValue"));
							$(this).data("newValue", this.value);
						} )
						.blur( navigate )
						.click( navigate )
						.parent().addClass("jsSelectNav");
					
					function navigate() {
						var newValue = $(this).data("newValue");
						if ( newValue && newValue != $(this).data("origValue") ) this.form.submit();
					};
				} );
		}
	} );
} )(jQuery);<!--gen-->