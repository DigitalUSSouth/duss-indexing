/****
javascript functions for search page
***/

/** Global variables


/**
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$(document).ready(function () {

	//alert (currentQuery);
	$(".boolean-selector").show();
	$(".boolean-selector:first").hide();
	$(".form-control.close").show();
	if ($(".close").length == 1){
		$(".close:first").hide();
	}

	try {
    minYear;
		maxYear;
		rMinYear;
		rMaxYear;
} catch(err) {
    // caught the reference error
    // code here will execute **only** if variable was never declared
		minYear=0;
		maxYear=2000;
		rMinYear=0;
		rMaxYear=2000;
	}
	//this iterates through the disableArray
	//defined in search-results.php
	//each function in the array hides a 'more' button
	//if there is no more information to display
	if(typeof disableArray != 'undefined' && disableArray != null){
      for(var i in disableArray){
	    disableArray[i]();
	  }
  }

console.log("this works");

	$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: minYear,
      max: maxYear,
      values: [ rMinYear, rMaxYear ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      },
	  change: function (event, ui) {
			var newMin = ui.values[0];
			var newMax = ui.values[1];

			currentQuery = currentQuery+'&fq[]=['+newMin +'+TO+'+ newMax+']&fq_field[]=years&'+'rMinYear='+newMin+'&rMaxYear='+newMax;
		  console.log (currentQuery);
			window.location = currentQuery;
	  }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
  } );

console.log("done");
});


$(".accordion-toggle").click(function (e) {
	//alert('strst');
	$(this).toggleClass("accordion-opened");
});
