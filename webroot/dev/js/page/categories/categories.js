jQuery(document).ready(function($) {
    /////////////////////////////////////
    //////////  SCROLLMAGIC  ////////////
    /////////////////////////////////////
    // init controller
    // eslint-disable-next-line
	var controller = new ScrollMagic.Controller();
    /////////////////////////////////////
    ///////////////  PIN  ///////////////
    /////////////////////////////////////
    // build scene
    // eslint-disable-next-line
	new ScrollMagic.Scene({
		triggerElement: "#category",
		triggerHook: 0,
		duration: "30%"
	})
    .setPin("#category")
    .addTo(controller);
    /////////////////////////////////////
    /////////////  SHOWTXT  /////////////
    /////////////////////////////////////
	var container = ($("#category")["0"].children["0"]);
        // build a tween
        // eslint-disable-next-line
	var showTxt = new TimelineMax();
	showTxt.from(
        container, 0.3, {
            autoAlpha:0,
            y:"+=10%", // eslint-disable-next-line
            ease:Linear.easeNone
        },0,4);
        // build scene
        // eslint-disable-next-line
	new ScrollMagic.Scene({
		triggerElement: "#category",
		offset: 100,
		triggerHook: 0,
		duration: "20%"
	})
        .setTween(showTxt)
        .addTo(controller);
        /////////////////////////////////////
        /////////////  OVERLAY  /////////////
        /////////////////////////////////////
	var overlay = ($("#category")["0"].children[1]);
        // build a tween
        // eslint-disable-next-line
	var showOverlay = new TimelineMax();
	showOverlay
        .from(
            overlay,
            0.3, {
                autoAlpha:0, // eslint-disable-next-line
                ease:Linear.easeNone
			},0,4
        );
        // build scene
        // eslint-disable-next-line
	new ScrollMagic.Scene({
		triggerElement: "#category",
		offset: -100,
		triggerHook: 0,
		duration: "20%"
	})
    .setTween(showOverlay)
    .addTo(controller);
});
