/*global animate*/
/*global showModal*/
/*global hideModal*/
/*global ScrollMagic*/

// import { animate, showModal, hideModal } from "functions";
jQuery(document).ready(function ($) {
    /* jshint ignore:start */
	function navbarToggle() {
		($('[data-nav-content]').hasClass("open")) ? $('[data-nav-content]').removeClass("open"): $('[data-nav-content]').addClass("open"); // open & close
	}
	// Remove message important
	var messageImportant = '.message-important';
	var PositionBottom_Header = Math.round($('section.header').outerHeight());
	var fixedMessageImportant = true;

	if(fixedMessageImportant){
		$( window ).scroll(function() {
			if($(messageImportant).length) {
				var PositionTop_MessageImportant = Math.round($(messageImportant).offset().top);
				if(PositionTop_MessageImportant > PositionBottom_Header) {
					$(messageImportant).css('position','absolute');
					fixedMessageImportant = false;
				}
			}
		});
	}
	
	$(messageImportant+' .exit').on('click', function () {
		if($(messageImportant).length) {
			$(messageImportant).remove();
		}
	});
    /////////////////////////////////////
    ////////////  LOADING  //////////////
    /////////////////////////////////////
	setTimeout(function () {
		animate(".loading", "fadeOut", "remove", "750");
		setTimeout(function () {
			$("header.container").addClass("fadeInUp animated");
			$("body").css("overflow-y", "auto");
		}, 500);
	}, 500);
    /////////////////////////////////////
    /////////////  MODAL  ///////////////
    /////////////////////////////////////
    //
    /////////////  OPEN  ////////////////
	$("body").on("click", ".modal-open", function (event) {
		event.preventDefault();
		showModal();
	});
    /////////////  EXIT  ////////////////
	$("body").on("click", ".modal-exit", function (event) {
		event.preventDefault();
		hideModal();
	});
	$(document).keyup(function (e) {
		if (e.keyCode == 27 && $(".modal").hasClass("show")) { // escape key maps to keycode `27`
			event.preventDefault();
			hideModal();
		}
	});
    /////////////////////////////////////
    //////////  SCROLLMAGIC /////////////
    /////////////////////////////////////
    ////////////  NAV PIN ///////////////
    // init controller
	var controller = new ScrollMagic.Controller();
    // build scene
	new ScrollMagic.Scene({
		triggerElement: "nav",
		triggerHook: 0,
		duration: 0
	})
    .setPin("nav")
    .addTo(controller);

    /////////////////////////////////////
    /////////////  DROPDOWN /////////////
    /////////////////////////////////////
	$("[data-dropdown-trigger]").on("click", function (event) {
		event.preventDefault();
		if ($(".dropdown").hasClass("active")) { // FERME
			$(".dropdown-overlay").fadeOut(300);
			$(".fa-caret-down").css("transform", "rotate(0deg)");
			$(".dropdown").slideUp("400", function () {
				$(this).removeClass("active");
			});
		} else { // OUVERT
			$(".dropdown-overlay").fadeIn(300); //fade
			$(".fa-caret-down").css("transform", "rotate(180deg)"); //rotate
			$(".dropdown").slideDown("400", function () { //slide
				$(this).addClass("active");
			});
		}
	});
	// NAV //////////
	$("[data-nav-trigger], [data-nav-content] a, [data-nav-content] button").on("click", function() { 
		navbarToggle();
	});
}); // FIN JQUERY
