/****
javascript functions for search page
***/

/** Global variables


/**
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$("#addRow").click(function (e) {
	var row = $(".search-row:first").clone();
	
	
	//alert (row);
	
	//row.removeAttr("id");
	
	//alert (row);
	
	row.insertBefore($(this).parent());
	//row.show();
	$(".boolean-selector").show();
	$(".boolean-selector:first").hide();
	$(".form-control.close").show();


  /*var section = $(this).parentsUntil("section").parent();
  var group   = section.find("select[name='role[]']").last().parent().parent().clone();
  var newID   = increaseID(group, "select");

  group.find("select").prop("id", newID).find("> option:selected").removeAttr("selected").parent().find("> option:first-child").prop("selected", "true");
  group.find("label").attr("for", newID);

  $(group).insertBefore($(this).parent().parent());
  group.show();

  group = section.find("input[name='role_value[]']").last().parent().parent().clone();
  newID = increaseID(group, "input");

  group.find("input").prop("id", newID).val("");
  group.find("label").attr("for", newID);

  $(group).insertBefore($(this).parent().parent());
  group.show();

  section.find(".close.hide").removeClass("hide");*/

  e.target.blur();
});


$("#home-search").on("click", ".close", function (e) {
	alert("close");
	$(this).parent().parent().remove();
	
	if ($(".close").length == 1){
		$(".close:first").hide();
	}
	
	$(".boolean-selector:first").hide();

  e.target.blur();
});



$(document).ready(function () {
	$(".boolean-selector").show();
	$(".boolean-selector:first").hide();
	$(".form-control.close").show();
	if ($(".close").length == 1){
		$(".close:first").hide();
	}
	
});



