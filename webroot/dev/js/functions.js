/*eslint-disable no-unused-vars*/

/**
 * Animation
 * @param {string} selector '#myId'
 * @param {string} animate 'myAnimation'
 * @param {string} options remove | hide | show
 * @param {number} time 
 */
function animate(selector, animate, options, time) {
	$(selector).addClass("animated " + animate + "");
	setTimeout(function () {
		$(selector).removeClass("animated " + animate + "");
		switch (options) {
		case "remove":
			$(selector).remove();
			break;
		case "hide":
			$(selector).hide();
			break;
		case "show":
			$(selector).show();
			break;
		}
	}, time);
}
/**
 * Smooth Scroll
 */
$(function () {
	var time = 1000;
	$("a[href*=\"#\"]:not([href=\"#\"])").click(function () {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
			var test = (target["0"].className);
			if (target.length) {
				if (test == "developpeur realisations") {
					$("html, body").animate({
						scrollTop: target.offset().top + 170
					}, time);
				} else {
					$("html, body").animate({
						scrollTop: target.offset().top - 50
					}, time);
				}
				return false;
			}
		}
	});
});
/**
 * Show Modal
 */
function showModal() {
	var modal = $(".modal-container");
	var modalOverlay = $("aside.modal");
	$(modalOverlay).css("display", "flex");
	$(modal).css("display", "block");
	animate(modalOverlay, "fadeIn", "show", "1000");
	animate(modal, "fadeInDown", "show", "1000");
	$("aside #name").focus();
	$(".modal").removeClass("hide");
	$(".modal").addClass("show");
}
/**
 *Hide Modal
 */
function hideModal() {
	var modal = $(".modal-container");
	var modalOverlay = $("aside.modal");
	animate(modal, "fadeOutUp", "hide", "1000");
	animate(modalOverlay, "fadeOut", "hide", "1000");
	$(".modal").removeClass("show");
	$(".modal").addClass("hide");
}

// export { animate, showModal, hideModal };
