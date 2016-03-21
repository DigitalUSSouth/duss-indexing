


/****
javascript functions for search page
***/

/** Global variables


/**
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$("#addRow").click(function (e) {
	var row = $("#searchRow");
	alert (row);
	
	row.removeAttr("id");
	
	alert (row);
	
	$(row).clone().insertBefore($(this).parent().parent());
	row.show();

/***
TODO: Finish/debug this function
**/

  e.target.blur();
});


