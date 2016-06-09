/**
 * duss.js
 *
 * Author: Center for Digital Humanities - University of South Carolina.
 * Version: Alpha.
 * Copyright: 2015. All Rights Reserved.
 */

 /**
 * Fades Project Icons.
 
 This does not work correctly on Firefox, thus it is commented out.*/
 $(document).ready(function() {
  
$("img.carouselimg").hover(
function() {
$(this).stop().animate({"opacity": "0.98"}, "fast");
},
function() {
$(this).stop().animate({"opacity": ".7"}, "fast");
});
});

/**
 * Function to be called once the window has finished loaded.
 */
$(window).load(function () {
  // Fade out the overlay once everything is finished.
  $("body > .overlay").fadeOut();
});

/**
 * Function to be called once the DOM is ready.
 */
$(document).ready(function () {
  // Declare that the navigation must be sticky.
  $("nav").sticky({topSpacing: 0});

  // Declare that a carousel must be slick.
  $("#carousel").slick({
     autoplay: true,
     autoplaySpeed: 2500,
     arrows: false,
     pauseOnHover: false
  });

  // Declare that the projects must be slick.
  $("#projects .row").slick({
    autoplay: true,
    autoplaySpeed: 10000,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [ {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    } ]
  });
});

/**
 * Function to serve as a catch-all in the instance that resources take over a minute to load.
 */
setTimeout(function () {
  if ($("body > .overlay").is(":visible")) {
    $("body > .overlay").fadeOut();
  }
}, 60000);

/**
 * Function to be called when the user is clicking to visit the next section.
 */
$("i.fa.fa-3x.fa-chevron-down").click(function () {
  var destination = null;
  if ($(this).parent().prop("id") == "splash") {
    destination = $("section#home");
  } else if ($(this).parent().prop("id") == "projects") {
    destination = $("section#contact");
  } else {
    destination = $(this).parent().next();
  }

  $("html, body").animate({scrollTop: destination.offset().top}, 1200);
});

/**
 * Function to be called when a user clicks on the navigation.
 *
 * @param e: The event that is occurring (i.e. click).
 */
$(".nav.navbar-nav > li").click(function (e) {
  var link = $(this).find("> a").prop("href").split("/");
  var destination = link[link.length - 1].substring(1, link[link.length - 1].length);

  $("html, body").animate({scrollTop: $("#" + destination).offset().top }, 1200);

  // This is a life savor.
  e.target.blur();
  e.preventDefault();
});

/**
 * Function to be called when a user clicks on the navigation.
 *
 * @param e: The event that is occurring (i.e. click).
 */
$(".nav.navbar-nav > li").click(function (e) {
  var link = $(this).find("> a").prop("href").split("/");
  var destination = link[link.length - 1].substring(1, link[link.length - 1].length);

  $("html, body").animate({scrollTop: $("#" + destination).offset().top }, 1200);

  // This is a life savor.
  e.target.blur();
  e.preventDefault();
});

/**
 * Function to send a user to the corresponding project that was clicked in the carousel.
 */
$("#about #carousel").on("click", "img", function () {
  var alt = $(this).prop("alt");

  $("#projects .project-listing").each(function () {
    if (alt == $.trim($(this).text())) {
      $(this).click();
      return false;
    }
  });
});

/**
 * Function to display a project splash page to a user upon click.
 */
$("#projects").on("click", ".project-listing", function () {
  var text = $.trim($(this).find("> h3").text());
  var list = $("#projectDetail");
  var item;

  // For some reason, when you do $("#projectDetail").find("#" + text).length, it returns 0 instead of 1.
  // To combat this, looping is the next option. Fuck speed.
  list.find("> .row").each(function () {
    if ($(this).prop("id") == text) {
      item = $(this);
      return false;
    }
  });

  // Skip if the project is already displayed.
  if (list.find("> .row:visible").prop("id") == item.prop("id")) return;

  // Determine how the page should readjust.
  var destination = $(window).height() > 991 ? $("#projects") : $("#projectDetail");

  // Execute if detail is not visible.
  if (list.find("> .row:visible").length != 1) {
    if ($(window).height() > 991) {
      $("#projects").animate({height: "40%"}).css("min-height", "initial").find("i.fa-chevron-down").fadeOut();
    }

    list.slideDown(function () {
      $("html, body").animate({scrollTop: destination.offset().top - $("nav").height()});
      item.fadeIn("slow");
    });
  }

  // Execute if detail is visible.
  else {
    list.find("> .row:visible").fadeOut("fast", function () {
      $("html, body").animate({scrollTop: destination.offset().top - $("nav").height()});
      item.fadeIn("slow");
    });
  }
});

/**
 * Function to slide up the project detail section by user click.
 */
$("#projectDetail > .close").click(function () {
  $("#projects").animate({"min-height": "100%"}, function () {
    $(this).css("height", "");
  }).find("i.fa-chevron-down").fadeIn();

  var item = $("#projectDetail").find("> .row:visible").fadeOut();
  $("html, body").animate({scrollTop: $("#projects").offset().top});
  $("#projectDetail").slideUp(function () {
    item.fadeOut(function () {

    });
  });
});

/**
 * Function to dismiss the contact alert notification and remove any content.
 */
$("#contact .alert > .close").click(function() {
  $(this).parent().slideUp(function () {
    $(this).find("*").not("button.close").remove();
  });
});

/**
 * Function to deliver an email from the contact form.
 *
 * @param e: The event that is going on (i.e. submitting)
 */
$("#contact form").submit(function (e) {
  var alert    = $("#contact .alert");
  var name     = $.trim($("#contact form input#name").val());
  var email    = $.trim($("#contact form input#email").val());
  var message  = $.trim($("#contact form textarea#message").val());
  var question = $.trim($("#contact form label[for='answer']").text());
  var answer   = $.trim($("#contact form input#answer").val());

  $("#contact input, #contact textarea").parent().removeClass("has-error");

  // Check name.
  if (name === "") {
    $("#contact form input#name").parent().addClass("has-error");
    contactAlert("warning", "The name is blank.");
    return false;
  }

  // Check email.
  if (email === "" && !/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i.test(email)) {
    $("#contact form input#email").parent().addClass("has-error");
    contactAlert("warning", "The email is not a valid email.");
    return false;
  }

  // Check message.
  if (message === "") {
    $("#contact form textarea#message").parent().addClass("has-error");
    contactAlert("warning", "The message appears to be blank.");
    return false;
  }

  // Check math.
  if (parseInt(question.split(" ")[0], 10) + parseInt(question.split(" ")[2], 10) != parseInt(answer, 10)) {
    $("#contact form input#answer").parent().addClass("has-error");
    contactAlert("warning", "The math seems to be wrong.");
    return false;
  }

  // Send off.
  $.ajax({
    url: "index.php",
    type: "post",
    data: "name=" + name + "&email=" + email + "&message=" + message,
    beforeSend: function () {
      contactAlert("info", "Sending your stuff now...");
    },
    success: function (result) {
      var data = JSON.parse(result);
      if (data.type == "error") {
        contactAlert("error", data.text);
      } else {
        contactAlert("success", data.text);
        $("#contact input, #contact textarea").val("");
        $("#contact label[for='answer']").text(Math.ceil(Math.random() * 10) + " + " + Math.ceil(Math.random() * 10) + " =");
      }
    },
    error: function (msg) {
      contactAlert("error", msg.responseText);
    }
  }, "json");

  e.preventDefault();
  return false;
});

/**
 * Function to communicate to the user about the contact form.
 *
 * @param alertClass: The CSS class alert-<class> (Can be info, success, warning, danger)
 * @param text: The text to communicate with the user.
 */
function contactAlert(alertClass, text) {
  var alert = $("#contact .alert");

  // Remove.
  alert.removeClass("alert-info alert-success alert-warning alert-danger").find("*").not("button.close").remove();

  // Modify.
  alert.addClass("alert-" + alertClass).append("<p>" + text + "</p>");

  // Display.
  if (!alert.is(":visible")) {
    alert.slideDown();
  }
}
